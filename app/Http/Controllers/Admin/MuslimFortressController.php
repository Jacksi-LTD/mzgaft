<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MuslimFortress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MuslimFortressController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MuslimFortress::with(['category'])->select(sprintf('%s.*', (new MuslimFortress())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'muslim_fortress_edit';
                $deleteGate = 'muslim_fortress_delete';
                $crudRoutePart = 'muslim-fortresses';

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

            $table->editColumn('content', function ($row) {
                return $row->content ? $row->content : '';
            });

            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.muslim-fortresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('muslim_fortress_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('type', 'muslim_fortress')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.muslim-fortresses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muslimFortress = MuslimFortress::create($request->all());

        return redirect()->route('admin.muslim-fortresses.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('muslim_fortress_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muslimFortress = MuslimFortress::find($id);
        $categories = Category::where('type', 'muslim_fortress')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.muslim-fortresses.edit', compact('muslimFortress', 'categories'));
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('muslim_fortress_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muslimFortress = MuslimFortress::find($id);
        $muslimFortress->update($request->all());

        return redirect()->route('admin.muslim-fortresses.index');
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('muslim_fortress_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muslimFortress = MuslimFortress::find($id);
        $muslimFortress->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        MuslimFortress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}