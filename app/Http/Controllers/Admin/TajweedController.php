<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTajweedRequest;
use App\Http\Requests\PrayerrRequest;
use App\Models\Tajweed;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TajweedController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('tajweeds_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Tajweed::select(sprintf('%s.*', (new Tajweed())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                //$viewGate = 'tajweeds_show';
                $editGate = 'tajweeds_edit';
                $deleteGate = 'tajweeds_delete';
                $crudRoutePart = 'tajweeds';

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
            $table->editColumn('file', function ($row) {
                if (!$row->file) {
                    return '';
                }
                $links = [];
                foreach ($row->file as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'file']);

            return $table->make(true);
        }
        

        return view('admin.tajweeds.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('tajweeds_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.tajweeds.create');
    }

    public function store(PrayerrRequest $request)
    {
        $pray = Tajweed::create($request->all());

        if ($request->input('image', false)) {
            $pray->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('file', []) as $file) {
            $pray->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }


        return redirect()->route('admin.tajweeds.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('tajweeds_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit=Tajweed::find($id);

        return view('admin.tajweeds.edit', compact('edit'));
    }

    public function update(PrayerrRequest $request, $id)
    {
        $tajweeds=Tajweed::find($id);
        $tajweeds->update($request->all());

        if ($request->input('image', false)) {
            if (!$tajweeds->image || $request->input('image') !== $tajweeds->image->file_name) {
                if ($tajweeds->image) {
                    $tajweeds->image->delete();
                }
                $tajweeds->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($tajweeds->image) {
            $tajweeds->image->delete();
        }

        if (count($tajweeds->file) > 0) {
            foreach ($tajweeds->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $tajweeds->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $tajweeds->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        return redirect()->route('admin.tajweeds.index');
    }



    public function destroy($id)
    {
        abort_if(Gate::denies('tajweeds_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $prayes=Tajweed::findOrFail($id);
        $prayes->delete();

        return back();
    }

    public function massDestroy(MassDestroyTajweedRequest $request)
    {
        Tajweed::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
