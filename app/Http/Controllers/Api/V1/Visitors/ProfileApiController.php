<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Visitors\ProfileResource;
use App\Models\Profile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return ProfileResource::collection(Profile::with(['region', 'place', 'apiAtestatProducts', 'created_by'])->get());
    }

    public function show($atestat)
    {
        return new ProfileResource(Profile::with(['region', 'place', 'apiAtestatProducts', 'created_by'])->findOrfail($atestat));
    }
}