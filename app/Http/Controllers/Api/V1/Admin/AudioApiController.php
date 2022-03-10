<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\UpdateAudioRequest;
use App\Http\Resources\Admin\AudioResource;
use App\Models\Audio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AudioApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('audio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AudioResource(Audio::with(['writer', 'category', 'created_by'])->get());
    }

    public function store(StoreAudioRequest $request)
    {
        $audio = Audio::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        foreach ($request->input('images', []) as $file) {
            $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        return (new AudioResource($audio))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Audio $audio)
    {
        abort_if(Gate::denies('audio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AudioResource($audio->load(['writer', 'category', 'created_by']));
    }

    public function update(UpdateAudioRequest $request, Audio $audio)
    {
        $audio->update($request->all());

        if (count($audio->files) > 0) {
            foreach ($audio->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audio->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        if (count($audio->images) > 0) {
            foreach ($audio->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audio->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return (new AudioResource($audio))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Audio $audio)
    {
        abort_if(Gate::denies('audio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audio->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
