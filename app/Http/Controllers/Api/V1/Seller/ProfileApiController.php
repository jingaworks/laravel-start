<?php

namespace App\Http\Controllers\Api\V1\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\Seller\ProfileResource;
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

        return ProfileResource::collection(Profile::with(['serie', 'region', 'place', 'products', 'created_by'])->get());
    }

    public function store(StoreAtestatRequest $request)
    {
        $profile = Profile::create($request->all());

        if ($request->input('image', false)) {
            $profile->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new ProfileResource($atestat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Atestat $atestat)
    {
        abort_if(Gate::denies('profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProfileResource($profile->load(['serie', 'region', 'place', 'created_by']));
    }

    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->all());

        if ($request->input('image', false)) {
            if (!$profile->image || $request->input('image') !== $atestat->image->file_name) {
                if ($profile->image) {
                    $profile->image->delete();
                }

                $profile->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($atestat->image) {
            $profile->image->delete();
        }

        return (new ProfileResource($atestat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Atestat $atestat)
    {
        abort_if(Gate::denies('profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atestat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}