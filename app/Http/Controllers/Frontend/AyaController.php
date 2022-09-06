<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aya;
use App\Models\Surah;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AyaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('aya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ayas = Aya::with(['surah', 'created_by'])->orderBy('id', 'DESC')->get();

        $surahs = Surah::get();

        $users = User::get();

        return view('frontend.ayas.index', compact('ayas', 'surahs', 'users'));
    }

    public function show(Aya $aya)
    {
        abort_if(Gate::denies('aya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $aya->load('surah', 'created_by');

        return view('frontend.ayas.show', compact('aya'));
    }
}
