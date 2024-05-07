<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\StoreYoutubeRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use App\Models\YoutubeVideo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AudioYoutubeController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('audio_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = YoutubeVideo::with(['category'])->select(sprintf('%s.*', (new YoutubeVideo())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'youtubevideos_show';
                $editGate = 'youtubevideos_edit';
                $deleteGate = 'youtubevideos_delete';
                $crudRoutePart = 'youtubevideos';

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


            $table->rawColumns(['actions', 'placeholder', 'category', 'approved', 'image']);

            return $table->make(true);
        }

        $categories = Category::where('type', 'audio_books')->get();

        return view('admin.youtubevideos.index', compact( 'categories'));
    }

    public function create()
    {


        $categories = Category::where('type', 'youtubevideos')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.youtubevideos.create', compact('categories'));
    }

    public function store(StoreYoutubeRequest $request)
    {
        $audioBook = YoutubeVideo::create($request->all());

        if ($request->input('image', false)) {
            $audioBook->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }
        return redirect()->route('admin.youtubevideos.index');
    }

    public function edit($id)
    {

        $edit=YoutubeVideo::find($id);

        $categories = Category::where('type', 'youtubevideos')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $edit->load( 'category');

        return view('admin.youtubevideos.edit', compact('edit', 'categories'));
    }

    public function update(Request $request,$id)
    {
        $audioBook=YoutubeVideo::find($id);
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


        return redirect()->route('admin.youtubevideos.index');
    }

    public function show($id)
    {
       // abort_if(Gate::denies('audio_book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $show=YoutubeVideo::find($id);
        $show->load('category');

        return view('admin.youtubevideos.show', compact('show'));
    }

    public function destroy($id)
    {
       // abort_if(Gate::denies('audio_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $audioBook=YoutubeVideo::findOrFail($id);

        $audioBook->delete();

        return back();
    }

    public function massDestroy(MassDestroyAudioBookRequest $request)
    {
        YoutubeVideo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
