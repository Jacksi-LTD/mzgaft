<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Book::with(['writer', 'category', 'created_by'])->select(sprintf('%s.*', (new Book())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'book_show';
                $editGate = 'book_edit';
                $deleteGate = 'book_delete';
                $crudRoutePart = 'books';

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
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('files', function ($row) {
                if (!$row->files) {
                    return '';
                }
                $links = [];
                foreach ($row->files as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('images', function ($row) {
                if (!$row->images) {
                    return '';
                }
                $links = [];
                foreach ($row->images as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });


            $table->rawColumns(['actions', 'placeholder', 'writer', 'category', 'approved', 'image', 'file', 'files', 'images', 'audio_file']);

            return $table->make(true);
        }

        $people     = Person::where('type', 'books')->get();
        $categories = Category::where('type', 'books')->get();
        $users      = User::get();

        return view('admin.books.index', compact('people', 'categories', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('book_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.books.create', compact('categories', 'writers'));
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());

        if ($request->input('image', false)) {
            $imageFile = $request->input('image');
            $imagePath = storage_path('tmp/uploads/' . basename($imageFile));
            if (file_exists($imagePath)) {
                $book->addMedia($imagePath)->toMediaCollection('image');
            }
        }

        if ($request->input('file', false)) {
            $fileFile = $request->input('file');
            $filePath = storage_path('tmp/uploads/' . basename($fileFile));
            if (file_exists($filePath)) {
                $book->addMedia($filePath)->toMediaCollection('file');
            }
        }

        foreach ($request->input('files', []) as $file) {
            $filePath = storage_path('tmp/uploads/' . basename($file));
            if (file_exists($filePath)) {
                $book->addMedia($filePath)->toMediaCollection('files');
            }
        }

        foreach ($request->input('images', []) as $file) {
            $filePath = storage_path('tmp/uploads/' . basename($file));
            if (file_exists($filePath)) {
                $book->addMedia($filePath)->toMediaCollection('images');
            }
        }

        if ($request->input('audio_file', false)) {
            $audioFile = $request->input('audio_file');
            $audioPath = storage_path('tmp/uploads/' . basename($audioFile));
            if (file_exists($audioPath)) {
                $book->addMedia($audioPath)->toMediaCollection('audio_file');
            }
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $book->id]);
        }

        return redirect()->route('admin.books.index');
    }

    public function edit(Book $book)
    {
        abort_if(Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $writers = Person::where('type', 'books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::where('type', 'books')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $book->load('writer', 'category', 'created_by');

        return view('admin.books.edit', compact('book', 'categories', 'writers'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());

        if ($request->input('image', false)) {
            $imageFile = $request->input('image');
            if (!$book->image || $imageFile !== $book->image->file_name) {
                if ($book->image) {
                    $book->image->delete();
                }
                $imagePath = storage_path('tmp/uploads/' . basename($imageFile));
                if (file_exists($imagePath)) {
                    $book->addMedia($imagePath)->toMediaCollection('image');
                }
            }
        } elseif ($book->image) {
            $book->image->delete();
        }

        if ($request->input('file', false)) {
            $fileFile = $request->input('file');
            if (!$book->file || $fileFile !== $book->file->file_name) {
                if ($book->file) {
                    $book->file->delete();
                }
                $filePath = storage_path('tmp/uploads/' . basename($fileFile));
                if (file_exists($filePath)) {
                    $book->addMedia($filePath)->toMediaCollection('file');
                }
            }
        } elseif ($book->file) {
            $book->file->delete();
        }

        if (count($book->files) > 0) {
            foreach ($book->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $book->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $filePath = storage_path('tmp/uploads/' . basename($file));
                if (file_exists($filePath)) {
                    $book->addMedia($filePath)->toMediaCollection('files');
                }
            }
        }

        if (count($book->images) > 0) {
            foreach ($book->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $book->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $filePath = storage_path('tmp/uploads/' . basename($file));
                if (file_exists($filePath)) {
                    $book->addMedia($filePath)->toMediaCollection('images');
                }
            }
        }

        if ($request->input('audio_file', false) && $request->input('audio_file') != "undefined") {
            $audioFile = $request->input('audio_file');
            $currentAudioFile = $book->audio_file->first();
            if (!$currentAudioFile || $audioFile !== $currentAudioFile->file_name) {
                if ($currentAudioFile) {
                    $currentAudioFile->delete();
                }
                $audioPath = storage_path('tmp/uploads/' . basename($audioFile));
                if (file_exists($audioPath)) {
                    $book->addMedia($audioPath)->toMediaCollection('audio_file');
                }
            }
        } elseif ($book->audio_file->count() > 0) {
            $book->audio_file->first()->delete();
        }

        return redirect()->route('admin.books.index');
    }

    public function show(Book $book)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->load('writer', 'category', 'created_by');

        return view('admin.books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        abort_if(Gate::denies('book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->delete();

        return back();
    }

    public function massDestroy(MassDestroyBookRequest $request)
    {
        Book::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::denies('book_create') && Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (request()->has('size')) {
            $this->validate(request(), [
                'file' => 'max:' . request()->input('size') * 1024,
            ]);
        }

        $model         = new Book();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('book_create') && Gate::denies('book_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Book();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
