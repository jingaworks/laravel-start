<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProfileRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\Place;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profiles = Profile::all();

        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        abort_if(Gate::denies('profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Region::all()->pluck('mnemonic', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('denj', 'id')->prepend(trans('global.pleaseSelect'), '');

        $places = Place::all()->pluck('denloc', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.profiles.create', compact('series', 'regions', 'places'));
    }

    public function store(StoreProfileRequest $request)
    {
        $profile = auth()->user()->profile()->create($request->all());

        if ($request->input('image', false)) {
            $profile->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $profile->id]);
        }

        return redirect()->route('admin.profiles.index');
    }

    public function edit(Profile $profile)
    {
        abort_if(Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Region::all()->pluck('mnemonic', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('denj', 'id')->prepend(trans('global.pleaseSelect'), '');

        $places = Place::all()->pluck('denloc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profile->load('serie', 'region', 'place', 'created_by');

        return view('admin.profiles.edit', compact('series', 'regions', 'places', 'profile'));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());

        if ($request->input('image', false)) {
            if (!$profile->image || $request->input('image') !== $profile->image->file_name) {
                if ($profile->image) {
                    $profile->image->delete();
                }

                $profile->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($profile->image) {
            $profile->image->delete();
        }

        return redirect()->route('admin.profiles.index');
    }

    public function show(Profile $profile)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('serie', 'region', 'place', 'created_by');

        return view('admin.profiles.show', compact('profile'));
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfileRequest $request)
    {
        Profile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('profile_create') && Gate::denies('profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Profile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}