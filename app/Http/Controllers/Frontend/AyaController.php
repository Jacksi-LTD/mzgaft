<?php

namespace App\Http\Controllers\Frontend;

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

class AyaController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('aya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ayas = Aya::with(['surah', 'created_by'])->get();

        $surahs = Surah::get();

        $users = User::get();

        return view('frontend.ayas.index', compact('ayas', 'surahs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('aya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.ayas.create', compact('surahs'));
    }

    public function store(StoreAyaRequest $request)
    {
        $aya = Aya::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $aya->id]);
        }

        return redirect()->route('frontend.ayas.index');
    }

    public function edit(Aya $aya)
    {
        abort_if(Gate::denies('aya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $aya->load('surah', 'created_by');

        return view('frontend.ayas.edit', compact('aya', 'surahs'));
    }

    public function update(UpdateAyaRequest $request, Aya $aya)
    {
        $aya->update($request->all());

        return redirect()->route('frontend.ayas.index');
    }

    public function show(Aya $aya)
    {
        abort_if(Gate::denies('aya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aya->load('surah', 'created_by');

        return view('frontend.ayas.show', compact('aya'));
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
