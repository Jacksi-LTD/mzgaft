<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Surah;
use App\Models\User;

class TafsirController extends Controller
{
    public function index()
    {
        $surahs = Surah::with(['created_by'])->orderBy('id', 'ASC')->get();

        $users = User::get();

        return view('frontend.tafsir.index', compact('surahs', 'users'));
    }

    public function show($id)
    {
        $surah = Surah::findOrFail($id);

        $surahs = Surah::with(['created_by'])->orderBy('id', 'ASC')->get();

        $surah->load('created_by', 'surahAyas');

        $next = Surah::find($id + 1);

        $prev = Surah::find($id - 1);

        return view('frontend.tafsir.show', compact('surah', 'surahs', 'next', 'prev'));
    }
}
