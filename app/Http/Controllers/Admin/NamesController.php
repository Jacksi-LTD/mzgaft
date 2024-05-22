<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroygod_namesRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\Godname;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NamesController extends Controller
{


    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Godname::select(sprintf('%s.*', (new Godname())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'god_names_edit';
                $deleteGate = 'god_names_delete';
                $crudRoutePart = 'god_names';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        

        return view('admin.god_names.index');
    }

    public function create()
    {

        return view('admin.god_names.create');
    }

    public function store(Request $request)
    {

        $att = Godname::create($request->all());

        return redirect()->route('admin.god_names.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('god_names_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $god_names=Godname::find($id);
        return view('admin.god_names.edit',compact('god_names'));
    }

    public function update(Request $request, $id)
    {
        $att=Godname::find($id);
        $att->update($request->all());

        return redirect()->route('admin.god_names.index');
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('god_names_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Godname::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {
        Godname::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
