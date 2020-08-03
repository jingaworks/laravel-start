<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Visitors\AtestatResource;
use App\Models\Atestat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AtestatApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return new AtestatResource(Atestat::with(['serie', 'region', 'place', 'products', 'created_by'])->get());
    }

    public function show($atestat)
    {
        return new AtestatResource(Atestat::with(['serie', 'region', 'place', 'products', 'created_by'])->findOrfail($atestat));
    }
}