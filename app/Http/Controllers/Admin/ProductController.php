<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBookRequest;
use App\Http\Requests\MassProductRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\Product;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Product::with('category')->select(sprintf('%s.*', (new Product())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'product_edit';
                $deleteGate = 'product_delete';
                $crudRoutePart = 'product';

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
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->editColumn('details', function ($row) {
                return $row->details ? $row->details : '';
            });

            $table->editColumn('approved', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approved ? 'checked' : null) . '>';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category','approved', 'image']);

            return $table->make(true);
        }

        return view('admin.products.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::where('type', 'product')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create',compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }


        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product)
    {
        //abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $categories = Category::where('type', 'product')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.edit', compact('product','categories'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('image', false)) {
            if (!$product->image || $request->input('image') !== $product->image->file_name) {
                if ($product->image) {
                    $product->image->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($product->image) {
            $product->image->delete();
        }

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
       // abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('writer', 'category', 'created_by');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        //abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


}
