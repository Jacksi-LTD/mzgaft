<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroysuggestionsRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\Suggestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SuggestionsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Suggestion::select(sprintf('%s.*', (new Suggestion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'suggestions_show';
                $deleteGate = 'suggestions_delete';
                $crudRoutePart = 'suggestions';

                return view('partials.datatablesActions', compact(
                'deleteGate','viewGate',
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
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $suggestions = Suggestion::get();

        return view('admin.suggestions.index', compact('suggestions'));
    }


    public function edit($id)
    {
        abort_if(Gate::denies('suggestions_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $suggestions=Attention::find($id);
        return view('admin.suggestions.edit',compact('suggestions'));
    }

    public function update(StoreAttentionRequest $request, $id)
    {
        $att=Attention::find($id);
        $att->update($request->all());

        return redirect()->route('admin.suggestions.index');
    }

    public function show($id)
    {


       $show=Suggestion::find($id);

        return view('admin.suggestions.show', compact('show'));
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('suggestions_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Suggestion::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(MassDestroysuggestionsRequest $request)
    {
        Suggestion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
