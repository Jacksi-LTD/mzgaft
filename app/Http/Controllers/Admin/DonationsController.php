<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroydonationsRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Suggestion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DonationsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Donation::select(sprintf('%s.*', (new Donation())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'donations_show';
                $deleteGate = 'donations_delete';
                $crudRoutePart = 'donations';

                return view('partials.datatablesActions', compact(
                'deleteGate','viewGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('bank', function ($row) {
                return $row->bank ? $row->bank : '';
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('trans_number', function ($row) {
                return $row->trans_number ? $row->trans_number : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $donations = Donation::get();

        return view('admin.donations.index', compact('donations'));
    }


    public function edit($id)
    {
        abort_if(Gate::denies('donations_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $donations=Attention::find($id);
        return view('admin.donations.edit',compact('donations'));
    }

    public function update(StoreAttentionRequest $request, $id)
    {
        $att=Attention::find($id);
        $att->update($request->all());

        return redirect()->route('admin.donations.index');
    }

    public function show($id)
    {


       $show=Donation::find($id);

        return view('admin.donations.show', compact('show'));
    }


    public function destroy($id)
    {

        abort_if(Gate::denies('donations_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $att=Donation::find($id);
        $att->delete();

        return back();
    }


    public function massDestroy(MassDestroydonationsRequest $request)
    {
        Donation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
