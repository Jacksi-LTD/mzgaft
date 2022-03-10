<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAyaRequest;
use App\Http\Requests\UpdateAyaRequest;
use App\Http\Resources\Admin\AyaResource;
use App\Models\Aya;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AyaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('aya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AyaResource(Aya::with(['surah', 'created_by'])->get());
    }

    public function store(StoreAyaRequest $request)
    {
        $aya = Aya::create($request->all());

        return (new AyaResource($aya))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Aya $aya)
    {
        abort_if(Gate::denies('aya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AyaResource($aya->load(['surah', 'created_by']));
    }

    public function update(UpdateAyaRequest $request, Aya $aya)
    {
        $aya->update($request->all());

        return (new AyaResource($aya))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Aya $aya)
    {
        abort_if(Gate::denies('aya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aya->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
