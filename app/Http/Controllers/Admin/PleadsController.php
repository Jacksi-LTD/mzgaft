<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroypleadsRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\Godname;
use App\Models\Plead;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PleadsController extends Controller
{


    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Plead::select(sprintf('%s.*', (new Plead())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'pleads_edit';
                $deleteGate = 'pleads_delete';
                $crudRoutePart = 'pleads';

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

            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        

        return view('admin.pleads.index');
    }

    public function create()
    {

        return view('admin.pleads.create');
    }

    public function store(Request $request)
    {

        $att = Plead::create($request->all());

        return redirect()->route('admin.pleads.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('pleads_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $pleads=Plead::find($id);
        return view('admin.pleads.edit',compact('pleads'));
    }

    public function update(Request $request, $id)
    {
        $att=Plead::find($id);
        $att->update($request->all());

        return redirect()->route('admin.pleads.index');
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('pleads_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Plead::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {
        Plead::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
