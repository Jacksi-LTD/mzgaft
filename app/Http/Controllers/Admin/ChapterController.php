<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\ChapterRequest;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\StoreYoutubeRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Person;
use App\Models\User;
use App\Models\YoutubeVideo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChapterController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('audio_book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Chapter::with(['category'])->select(sprintf('%s.*', (new Chapter())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'chapters_edit';
                $deleteGate = 'chapters_delete';
                $crudRoutePart = 'chapters';

                return view('partials.datatablesActions', compact(
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

            $table->rawColumns(['actions', 'placeholder', 'category']);

            return $table->make(true);
        }

        $categories = Category::where('type', 'hadith')->get();

        return view('admin.chapters.index', compact( 'categories'));
    }

    public function create()
    {


        $categories = Category::where('type', 'hadith')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.chapters.create', compact('categories'));
    }

    public function store(ChapterRequest $request)
    {
        $audioBook = Chapter::create($request->all());

        return redirect()->route('admin.chapters.index');
    }

    public function edit($id)
    {

        $edit=Chapter::find($id);

        $categories = Category::where('type', 'hadith')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $edit->load( 'category');

        return view('admin.chapters.edit', compact('edit', 'categories'));
    }

    public function update(ChapterRequest $request,$id)
    {
        $audioBook=Chapter::find($id);
        $audioBook->update($request->all());



        return redirect()->route('admin.chapters.index');
    }


    public function destroy($id)
    {
       // abort_if(Gate::denies('audio_book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $audioBook=Chapter::findOrFail($id);

        $audioBook->delete();

        return back();
    }

    public function massDestroy(MassDestroyAudioBookRequest $request)
    {
        Chapter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
