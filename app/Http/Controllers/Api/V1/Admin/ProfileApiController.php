<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\Admin\ProfileResource;
use App\Models\Profile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfileResource(Profile::with(['serie', 'region', 'place', 'created_by'])->get());
    }

    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->all());

        if ($request->input('image', false)) {
            $profile->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new ProfileResource($profile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Profile $profile)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfileResource($Profile->load(['serie', 'region', 'place', 'created_by']));
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

        return (new ProfileResource($Profile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}