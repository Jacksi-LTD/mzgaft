<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAudioBookRequest;
use App\Http\Requests\MassDestroyPrayerRequest;
use App\Http\Requests\PrayerrRequest;
use App\Http\Requests\StoreAudioBookRequest;
use App\Http\Requests\UpdateAudioBookRequest;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\Prayer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PrayerController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        //abort_if(Gate::denies('prayer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Prayer::select(sprintf('%s.*', (new Prayer())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                //$viewGate = 'prayer_show';
                $editGate = 'prayer_edit';
                $deleteGate = 'prayer_delete';
                $crudRoutePart = 'prayer';

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
        

        return view('admin.prayer.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('prayer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.prayer.create');
    }

    public function store(PrayerrRequest $request)
    {
        $pray = Prayer::create($request->all());

        if ($request->input('image', false)) {
            $pray->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        foreach ($request->input('file', []) as $file) {
            $pray->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }


        return redirect()->route('admin.prayer.index');
    }

    public function edit($id)
    {
        //abort_if(Gate::denies('prayer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $edit=Prayer::find($id);

        return view('admin.prayer.edit', compact('edit'));
    }

    public function update(PrayerrRequest $request, $id)
    {
        $prayer=Prayer::find($id);
        $prayer->update($request->all());

        if ($request->input('image', false)) {
            if (!$prayer->image || $request->input('image') !== $prayer->image->file_name) {
                if ($prayer->image) {
                    $prayer->image->delete();
                }
                $prayer->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($prayer->image) {
            $prayer->image->delete();
        }

        if (count($prayer->file) > 0) {
            foreach ($prayer->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $prayer->file->pluck('file_name')->toArray();
        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $prayer->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        return redirect()->route('admin.prayer.index');
    }

    public function show(AudioBook $audioBook)
    {

    }

    public function destroy($id)
    {
        abort_if(Gate::denies('prayer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $prayes=Prayer::findOrFail($id);
        $prayes->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrayerRequest $request)
    {
        Prayer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
