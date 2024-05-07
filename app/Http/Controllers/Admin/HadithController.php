<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\StoreHadithRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Hadith;
use App\Models\Person;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HadithController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('hadith_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hadith::with(['chapter', 'category'])->select(sprintf('%s.*', (new Hadith())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hadith_show';
                $editGate = 'hadith_edit';
                $deleteGate = 'hadith_delete';
                $crudRoutePart = 'hadith';

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
            $table->addColumn('chapter_name', function ($row) {
                return $row->chapter ? $row->chapter->title : '';
            });
            

            $table->rawColumns(['actions', 'placeholder', 'chapter', 'category']);

            return $table->make(true);
        }

        $chapters     = Chapter::all();
        $categories = Category::where('type', 'hadiths')->get();

        return view('admin.hadith.index', compact('chapters', 'categories'));
    }

    public function create()
    {
        //abort_if(Gate::denies('hadith_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = Category::where('type', 'hadith')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hadith.create', compact('categories'));
    }

    public function store(StoreHadithRequest $request)
    {
        $audioBook = Hadith::create($request->all());
        

        return redirect()->route('admin.hadith.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('hadith_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit=Hadith::findOrFail($id);

        $categories = Category::where('type', 'hadith')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $edit->load('category');
        $chapters=Chapter::where('cat_id',$edit->category_id)->get();
        return view('admin.hadith.edit', compact('edit', 'categories','chapters'));
    }

    public function get_chapters(Request $request){
        $chapters=Chapter::where('cat_id',$request->category_id)->get();

        return view('admin.hadith.ajax',compact('chapters'));

    }

    public function update(StoreHadithRequest $request,$id)
    {
        $hadith=Hadith::findOrFail($id);
        $hadith->update($request->all());


        return redirect()->route('admin.hadith.index');
    }

    public function show($id)
    {
        abort_if(Gate::denies('hadith_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $show=Hadith::findOrFail($id);
        $show->load('chapter', 'category');

        return view('admin.hadith.show', compact('show'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('hadith_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $show=Hadith::findOrFail($id);
        $show->delete();

        return back();
    }

    public function massDestroy(MassDestroyAudioBookRequest $request)
    {
        Hadith::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
