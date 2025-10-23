<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroypleadsRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreAttentionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attention;
use App\Models\Category;
use App\Models\Godname;
use App\Models\Plead;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PleadsController extends Controller
{
    use MediaUploadingTrait;


    public function index(Request $request)
    {
        abort_if(Gate::denies('pleads_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    
        if ($request->ajax()) {
            $query = Plead::with(['category'])->select(sprintf('%s.*', (new Plead())->table));
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

            $table->editColumn('category', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }
        

        return view('admin.pleads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pleads_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categories = Category::where('type', 'pleads')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pleads.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('pleads_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $plead = Plead::create($request->all());

        if ($request->input('audio_file', false)) {
            $plead->addMedia(storage_path('tmp/uploads/' . basename($request->input('audio_file'))))->toMediaCollection('audio_file');
        }

        return redirect()->route('admin.pleads.index');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('pleads_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $pleads = Plead::find($id);
        $categories = Category::where('type', 'pleads')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        return view('admin.pleads.edit', compact('pleads', 'categories'));
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('pleads_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $plead = Plead::find($id);
        $plead->update($request->all());

    
        if ($request->input('audio_file', false) && $request->input('audio_file') != "undefined") {
            $currentAudioFile = $plead->audio_file->first();
            if (!$currentAudioFile || $request->input('audio_file') !== $currentAudioFile->file_name) {
                if ($currentAudioFile) {
                    $currentAudioFile->delete();
                }
                $plead->addMedia(storage_path('tmp/uploads/' . basename($request->input('audio_file'))))->toMediaCollection('audio_file');
            }
        } elseif ($plead->audio_file->count() > 0) {
            $plead->audio_file->first()->delete();
        }

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
