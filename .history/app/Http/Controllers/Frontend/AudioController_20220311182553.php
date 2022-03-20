<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioRequest;
use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\UpdateAudioRequest;
use App\Models\Audio;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AudioController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('audio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->get();

        // $people = Person::get();

        // $categories = Category::get();

        // $users = User::get();

        $type = request()->type;

        $people = Person::where('type','audios')->get();

        $categories = Category::where('type','audios')->get();

        return view('frontend.audios.index', compact('type', 'categories', 'people'));
    }


    public function category(Category $category)
    {
        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->get();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->get();

        return view('frontend.audios.category', compact('audios', 'some_audios', 'category'));
    }

    public function person(People $category)
    {
        $audios = Audio::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->get();

        $some_audios = Audio::with(['writer', 'category', 'created_by', 'media'])->get();

        return view('frontend.audios.category', compact('audios', 'some_audios', 'category'));
    }

    public function create()
    {
        abort_if(Gate::denies('audio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.audios.create', compact('categories', 'writers'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $audio->id]);
        }

        return redirect()->route('frontend.audios.index');
    }

    public function edit(Audio $audio)
    {
        abort_if(Gate::denies('audio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audio->load('writer', 'category', 'created_by');

        return view('frontend.audios.edit', compact('audio', 'categories', 'writers'));
    }

    public function update(UpdateAudioRequest $request, Audio $audio)
    {
        $audio->update($request->all());

        if (count($audio->files) > 0) {
            foreach ($audio->files as $media) {
                if (! in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audio->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        if (count($audio->images) > 0) {
            foreach ($audio->images as $media) {
                if (! in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $audio->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('frontend.audios.index');
    }

    public function show(Audio $audio)
    {
        abort_if(Gate::denies('audio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audio->load('writer', 'category', 'created_by');

        return view('frontend.audios.show', compact('audio'));
    }

    public function destroy(Audio $audio)
    {
        abort_if(Gate::denies('audio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audio->delete();

        return back();
    }

    public function massDestroy(MassDestroyAudioRequest $request)
    {
        Audio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('audio_create') && Gate::denies('audio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Audio();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
