<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Surah;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SurahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('surah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surahs = Surah::with(['created_by'])->orderBy('created_at', 'DESC')->get();

        $users = User::get();

        return view('frontend.surahs.index', compact('surahs', 'users'));
    }

    public function show(Surah $surah)
    {
        abort_if(Gate::denies('surah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surah->load('created_by', 'surahAyas');

        return view('frontend.surahs.show', compact('surah'));
    }
}
