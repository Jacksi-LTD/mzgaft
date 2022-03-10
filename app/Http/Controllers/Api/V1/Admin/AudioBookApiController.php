<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Http\Resources\Admin\AudioBookResource;
use App\Models\AudioBook;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AudioBookApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('audio_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AudioBookResource(AudioBook::with(['writer', 'category', 'created_by'])->get());
    }

    public function store(StoreAudioBookRequest $request)
    {
        $audioBook = AudioBook::create($request->all());

        if ($request->input('image', false)) {
            $audioBook->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('file', []) as $file) {
            $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }

        foreach ($request->input('audio', []) as $file) {
            $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('audio');
        }

        return (new AudioBookResource($audioBook))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AudioBookResource($audioBook->load(['writer', 'category', 'created_by']));
    }

    public function update(UpdateAudioBookRequest $request, AudioBook $audioBook)
    {
        $audioBook->update($request->all());

        if ($request->input('image', false)) {
            if (!$audioBook->image || $request->input('image') !== $audioBook->image->file_name) {
                if ($audioBook->image) {
                    $audioBook->image->delete();
                }
                $audioBook->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($audioBook->image) {
            $audioBook->image->delete();
        }

        if (count($audioBook->file) > 0) {
            foreach ($audioBook->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audioBook->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        if (count($audioBook->audio) > 0) {
            foreach ($audioBook->audio as $media) {
                if (!in_array($media->file_name, $request->input('audio', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audioBook->audio->pluck('file_name')->toArray();
        foreach ($request->input('audio', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('audio');
            }
        }

        return (new AudioBookResource($audioBook))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audioBook->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
