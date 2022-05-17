<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class AudioBookController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('audio_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AudioBook::with(['writer', 'category', 'created_by'])->select(sprintf('%s.*', (new AudioBook())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'audio_book_show';
                $editGate = 'audio_book_edit';
                $deleteGate = 'audio_book_delete';
                $crudRoutePart = 'audio-books';

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
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('file', function ($row) {
                if (!$row->file) {
                    return '';
                }
                $links = [];
                foreach ($row->file as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('audio', function ($row) {
                if (!$row->audio) {
                    return '';
                }
                $links = [];
                foreach ($row->audio as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'writer', 'category', 'approved', 'image', 'file', 'audio']);

            return $table->make(true);
        }

        $people     = Person::where('type', 'audio_books')->get();
        $categories = Category::where('type', 'audio_books')->get();
        $users      = User::get();

        return view('admin.audioBooks.index', compact('people', 'categories', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('audio_book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'audio_books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'audio_books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.audioBooks.create', compact('categories', 'writers'));
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
        $audioBook->syncFromMediaLibraryRequest($request->get('audio'))
                ->toMediaCollection('audio');

        // foreach ($request->input('audio', []) as $file) {
        //     $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('audio');
        // }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $audioBook->id]);
        }

        return redirect()->route('admin.audio-books.index');
    }

    public function edit(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'audio_books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'audio_books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $audioBook->load('writer', 'category', 'created_by');

        return view('admin.audioBooks.edit', compact('audioBook', 'categories', 'writers'));
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
        $audioBook->syncFromMediaLibraryRequest($request->get('audio'))
                ->toMediaCollection('audio');

        // if (count($audioBook->audio) > 0) {
        //     foreach ($audioBook->audio as $media) {
        //         if (!in_array($media->file_name, $request->input('audio', []))) {
        //             $media->delete();
        //         }
        //     }
        // }
        // $media = $audioBook->audio->pluck('file_name')->toArray();
        // foreach ($request->input('audio', []) as $file) {
        //     if (count($media) === 0 || !in_array($file, $media)) {
        //         $audioBook->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('audio');
        //     }
        // }

        return redirect()->route('admin.audio-books.index');
    }

    public function show(AudioBook $audioBook)
    {
        abort_if(Gate::denies('audio_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $audioBook->load('writer', 'category', 'created_by');

        return view('admin.audioBooks.show', compact('audioBook'));
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
