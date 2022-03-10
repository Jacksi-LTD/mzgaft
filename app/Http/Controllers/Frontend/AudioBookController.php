<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AudioBookController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('audio_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audioBooks = AudioBook::with(['writer', 'category', 'created_by', 'media'])->get();

        $people = Person::get();

        $categories = Category::get();

        $users = User::get();

        return view('frontend.audioBooks.index', compact('audioBooks', 'categories', 'people', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('audio_book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.audioBooks.create', compact('categories', 'writers'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $audioBook->id]);
        }

        return redirect()->route('frontend.audio-books.index');
    }

    public function edit(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audioBook->load('writer', 'category', 'created_by');

        return view('frontend.audioBooks.edit', compact('audioBook', 'categories', 'writers'));
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

        return redirect()->route('frontend.audio-books.index');
    }

    public function show(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audioBook->load('writer', 'category', 'created_by');

        return view('frontend.audioBooks.show', compact('audioBook'));
    }

    public function destroy(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audioBook->delete();

        return back();
    }

    public function massDestroy(MassDestroyAudioBookRequest $request)
    {
        AudioBook::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('audio_book_create') && Gate::denies('audio_book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AudioBook();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
