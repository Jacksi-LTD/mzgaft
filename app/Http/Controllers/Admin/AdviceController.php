<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyadviceRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Advice;
use App\Models\Attention;
use App\Models\Category;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdviceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Advice::select(sprintf('%s.*', (new Advice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'advice_edit';
                $deleteGate = 'advice_delete';
                $crudRoutePart = 'advice';

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

            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $advices = Advice::get();

        return view('admin.advice.index', compact('advices'));
    }

    public function create()
    {

        return view('admin.advice.create');
    }

    public function store(StoreAttentionRequest $request)
    {

        $att = Advice::create($request->all());

        return redirect()->route('admin.advice.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('advice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $advice=Advice::find($id);
        return view('admin.advice.edit',compact('advice'));
    }

    public function update(StoreAttentionRequest $request, $id)
    {
        $att=Advice::find($id);
        $att->update($request->all());

        return redirect()->route('admin.advice.index');
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('advice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Advice::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(MassDestroyadviceRequest $request)
    {
        Advice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
