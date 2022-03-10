<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAyaRequest;
use App\Http\Requests\StoreAyaRequest;
use App\Http\Requests\UpdateAyaRequest;
use App\Models\Aya;
use App\Models\Surah;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AyaController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('aya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Aya::with(['surah', 'created_by'])->select(sprintf('%s.*', (new Aya())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'aya_show';
                $editGate = 'aya_edit';
                $deleteGate = 'aya_delete';
                $crudRoutePart = 'ayas';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('aya', function ($row) {
                return $row->aya ? $row->aya : '';
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
            });
            $table->addColumn('surah_name', function ($row) {
                return $row->surah ? $row->surah->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'surah']);

            return $table->make(true);
        }

        $surahs = Surah::get();
        $users  = User::get();

        return view('admin.ayas.index', compact('surahs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('aya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ayas.create', compact('surahs'));
    }

    public function store(StoreAyaRequest $request)
    {
        $aya = Aya::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $aya->id]);
        }

        return redirect()->route('admin.ayas.index');
    }

    public function edit(Aya $aya)
    {
        abort_if(Gate::denies('aya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aya->load('surah', 'created_by');

        return view('admin.ayas.edit', compact('aya', 'surahs'));
    }

    public function update(UpdateAyaRequest $request, Aya $aya)
    {
        $aya->update($request->all());

        return redirect()->route('admin.ayas.index');
    }

    public function show(Aya $aya)
    {
        abort_if(Gate::denies('aya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aya->load('surah', 'created_by');

        return view('admin.ayas.show', compact('aya'));
    }

    public function destroy(Aya $aya)
    {
        abort_if(Gate::denies('aya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aya->delete();

        return back();
    }

    public function massDestroy(MassDestroyAyaRequest $request)
    {
        Aya::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('aya_create') && Gate::denies('aya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Aya();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
