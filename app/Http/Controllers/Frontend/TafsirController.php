<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySurahRequest;
use App\Http\Requests\StoreSurahRequest;
use App\Http\Requests\UpdateSurahRequest;
use App\Models\Surah;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TafsirController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('surah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::with(['created_by'])->get();

        $users = User::get();

        return view('frontend.tafsir.index', compact('surahs', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('surah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.tafsir.create');
    }

    public function store(StoreSurahRequest $request)
    {
        $surah = Surah::create($request->all());

        return redirect()->route('frontend.tafsir.index');
    }

    public function edit(Surah $surah)
    {
        abort_if(Gate::denies('surah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surah->load('created_by');

        return view('frontend.tafsir.edit', compact('surah'));
    }

    public function update(UpdateSurahRequest $request, Surah $surah)
    {
        $surah->update($request->all());

        return redirect()->route('frontend.tafsir.index');
    }

    public function show(Surah $surah)
    {
        abort_if(Gate::denies('surah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surah->load('created_by', 'surahAyas');

        return view('frontend.tafsir.show', compact('surah'));
    }

    public function destroy(Surah $surah)
    {
        abort_if(Gate::denies('surah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surah->delete();

        return back();
    }

    public function massDestroy(MassDestroySurahRequest $request)
    {
        Surah::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
