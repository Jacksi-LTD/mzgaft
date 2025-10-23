<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MuslimFortressCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Category::where('type', 'muslim_fortress')->select(sprintf('%s.*', (new Category())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'muslim_fortress_category_edit';
                $deleteGate = 'muslim_fortress_category_delete';
                $crudRoutePart = 'muslim-fortress-categories';

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

            $table->editColumn('type', function ($row) {
                return $row->type ? Category::TYPE_SELECT[$row->type] ?? $row->type : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.muslim-fortress-categories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('muslim_fortress_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.muslim-fortress-categories.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category = Category::create([
            'name' => $request->name,
            'type' => 'muslim_fortress'
        ]);

        return redirect()->route('admin.muslim-fortress-categories.index');
    }

    public function edit(Category $muslim_fortress_category)
    {
        abort_if(Gate::denies('muslim_fortress_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.muslim-fortress-categories.edit', compact('muslim_fortress_category'));
    }

    public function update(Request $request, Category $muslim_fortress_category)
    {
        abort_if(Gate::denies('muslim_fortress_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $muslim_fortress_category->update([
            'name' => $request->name,
            'type' => 'muslim_fortress'
        ]);

        return redirect()->route('admin.muslim-fortress-categories.index');
    }

    public function destroy(Category $muslim_fortress_category)
    {
        abort_if(Gate::denies('muslim_fortress_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Check if category has any muslim fortresses
        if ($muslim_fortress_category->muslimFortresses()->count() > 0) {
            return back()->withErrors(['error' => 'Cannot delete category that has muslim fortresses associated with it.']);
        }

        $muslim_fortress_category->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('muslim_fortress_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::whereIn('id', request('ids'))->where('type', 'muslim_fortress');

        foreach ($categories->get() as $category) {
            if ($category->muslimFortresses()->count() > 0) {
                return back()->withErrors(['error' => 'Cannot delete categories that have muslim fortresses associated with them.']);
            }
        }

        $categories->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}