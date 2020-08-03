<?php

namespace App\Http\Controllers\Api\V1\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAtestatRequest;
use App\Http\Requests\UpdateAtestatRequest;
use App\Http\Resources\Seller\AtestatResource;
use App\Models\Atestat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AtestatApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('atestat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AtestatResource(Atestat::with(['serie', 'region', 'place', 'products', 'created_by'])->get());
    }

    public function store(StoreAtestatRequest $request)
    {
        $atestat = Atestat::create($request->all());

        if ($request->input('image', false)) {
            $atestat->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new AtestatResource($atestat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Atestat $atestat)
    {
        abort_if(Gate::denies('atestat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AtestatResource($atestat->load(['serie', 'region', 'place', 'created_by']));
    }

    public function update(UpdateAtestatRequest $request, Atestat $atestat)
    {
        $atestat->update($request->all());

        if ($request->input('image', false)) {
            if (!$atestat->image || $request->input('image') !== $atestat->image->file_name) {
                if ($atestat->image) {
                    $atestat->image->delete();
                }

                $atestat->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($atestat->image) {
            $atestat->image->delete();
        }

        return (new AtestatResource($atestat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Atestat $atestat)
    {
        abort_if(Gate::denies('atestat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atestat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}