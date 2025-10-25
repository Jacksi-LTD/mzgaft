<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePleadCategoryRequest;
use App\Http\Requests\UpdatePleadCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PleadCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('plead_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        if ($request->ajax()) {
            $query = Category::where('type', 'pleads')->select(sprintf('%s.*', (new Category())->table));
                
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'plead_category_edit';
                $deleteGate = 'plead_category_delete';
                $crudRoutePart = 'plead-categories';

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

        return view('admin.plead-categories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('plead_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plead-categories.create');
    }

    public function store(StorePleadCategoryRequest $request)
    {
        abort_if(Gate::denies('plead_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category = Category::create($request->validated());

        return redirect()->route('admin.plead-categories.index');
    }

    public function edit(Category $plead_category)
    {
        abort_if(Gate::denies('plead_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plead-categories.edit', compact('plead_category'));
    }

    public function update(UpdatePleadCategoryRequest $request, Category $plead_category)
    {
        abort_if(Gate::denies('plead_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plead_category->update($request->validated());

        return redirect()->route('admin.plead-categories.index');
    }

    public function destroy(Category $plead_category)
    {
        abort_if(Gate::denies('plead_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Check if category has any pleads
        if ($plead_category->pleads()->count() > 0) {
            return back()->withErrors(['error' => 'Cannot delete category that has pleads associated with it.']);
        }

        $plead_category->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('plead_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::whereIn('id', request('ids'))->where('type', 'pleads');

        foreach ($categories->get() as $category) {
            if ($category->pleads()->count() > 0) {
                return back()->withErrors(['error' => 'Cannot delete categories that have pleads associated with them.']);
            }
        }

        $categories->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}