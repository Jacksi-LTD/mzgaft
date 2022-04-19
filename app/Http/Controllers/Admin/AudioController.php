<?php
namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class AudioController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('audio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Audio::with(['writer', 'category', 'created_by'])->select(sprintf('%s.*', (new Audio())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'audio_show';
                $editGate = 'audio_edit';
                $deleteGate = 'audio_delete';
                $crudRoutePart = 'audios';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('visits', function ($row) {
                return $row->visits ? $row->visits : '';
            });
            $table->addColumn('writer_name', function ($row) {
                return $row->writer ? $row->writer->name : '';
            });

            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });
            $table->editColumn('files', function ($row) {
                if (! $row->files) {
                    return '';
                }
                $links = [];
                foreach ($row->files as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('images', function ($row) {
                if (! $row->images) {
                    return '';
                }
                $links = [];
                foreach ($row->images as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'writer', 'category', 'approved', 'files', 'images']);

            return $table->make(true);
        }

        $people = Person::where('type', 'audios')->get();
        $categories = Category::where('type', 'audios')->get();
        $users = User::get();

        return view('admin.audios.index', compact('people', 'categories', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('audio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'audios')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'audios')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.audios.create', compact('categories', 'writers'));
    }

    public function store(StoreAudioRequest $request)
    {
        $audio = Audio::create($request->all());
        $audio->syncFromMediaLibraryRequest($request->get('files'))
                ->toMediaCollection('files');
        $audio->syncFromMediaLibraryRequest($request->get('images'))
                ->toMediaCollection('images');

        // foreach ($request->input('files', []) as $file) {
        //     // $duration = (new \wapmorgan\Mp3Info\Mp3Info($file, true))->duration;
        //     $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))
        //     ->withCustomProperties(
        //         ['title' => 'العنوان الأول',
        //         'duration' => '00:00']
        //         )->toMediaCollection('files');
        // }

        // foreach ($request->input('images', []) as $file) {
        //     $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $audio->id]);
        // }

        return redirect()->route('admin.audios.index');
    }

    public function edit(Audio $audio)
    {
        abort_if(Gate::denies('audio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'audios')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'audios')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audio->load('writer', 'category', 'created_by');

        return view('admin.audios.edit', compact('audio', 'categories', 'writers'));
    }

    public function update(UpdateAudioRequest $request, Audio $audio)
    {

        $audio->update($request->all());

        $audio->syncFromMediaLibraryRequest($request->get('files'))
                ->toMediaCollection('files');
        $audio->syncFromMediaLibraryRequest($request->get('images'))
                ->toMediaCollection('images');

        // $audio->save();
                /*
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
                // $duration = (new \wapmorgan\Mp3Info\Mp3Info($file, true))->duration;
                $audio->addMedia(storage_path('tmp/uploads/' . basename($file)))
                ->withCustomProperties(['title' => 'العنوان الأول', 'duration' => '00:00'])
                ->toMediaCollection('files');
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
*/
        return redirect()->route('admin.audios.index');
    }

    public function show(Audio $audio)
    {
        abort_if(Gate::denies('audio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audio->load('writer', 'category', 'created_by');

        return view('admin.audios.show', compact('audio'));
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
