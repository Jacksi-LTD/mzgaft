<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\MassDestroyHadithRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\StoreHadithRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Hadith;
use App\Models\Person;
use App\Models\Remembrance;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RemembrancesController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('remembrances_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Remembrance::with(['category'])->select(sprintf('%s.*', (new Remembrance())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'remembrances_edit';
                $deleteGate = 'remembrances_delete';
                $crudRoutePart = 'remembrances';

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
            $table->editColumn('sort', function ($row) {
                return $row->sort ? $row->sort : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category']);

            return $table->make(true);
        }

        $categories = Category::where('type', 'remembrance')->get();

        return view('admin.remembrances.index', compact( 'categories'));
    }

    public function create()
    {
        //abort_if(Gate::denies('remembrances_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = Category::where('type', 'remembrance')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.remembrances.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $audioBook = Remembrance::create($request->all());
        

        return redirect()->route('admin.remembrances.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('remembrances_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $edit=Remembrance::findOrFail($id);

        $categories = Category::where('type', 'remembrance')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $edit->load('category');
        return view('admin.remembrances.edit', compact('edit', 'categories'));
    }


    public function update(Request $request,$id)
    {
        $remembrances=Remembrance::findOrFail($id);
        $remembrances->update($request->all());


        return redirect()->route('admin.remembrances.index');
    }


    public function destroy($id)
    {
        abort_if(Gate::denies('remembrances_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $show=Remembrance::findOrFail($id);
        $show->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Remembrance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
