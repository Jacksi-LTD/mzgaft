<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyattentionsRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AttentionsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Attention::select(sprintf('%s.*', (new Attention())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'attentions_edit';
                $deleteGate = 'attentions_delete';
                $crudRoutePart = 'attentions';

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

        $categories = Attention::get();

        return view('admin.attentions.index', compact('categories'));
    }

    public function create()
    {

        return view('admin.attentions.create');
    }

    public function store(StoreAttentionRequest $request)
    {

        $att = Attention::create($request->all());

        return redirect()->route('admin.attentions.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('attentions_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $attentions=Attention::find($id);
        return view('admin.attentions.edit',compact('attentions'));
    }

    public function update(StoreAttentionRequest $request, $id)
    {
        $att=Attention::find($id);
        $att->update($request->all());

        return redirect()->route('admin.attentions.index');
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('attentions_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Attention::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(MassDestroyattentionsRequest $request)
    {
        Attention::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
