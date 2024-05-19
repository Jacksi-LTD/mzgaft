<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attention;
use Symfony\Component\HttpFoundation\Response;

class AttentionsController extends Controller
{
    public function index()
    {

        $attentions = Attention::orderBy('id','desc')->paginate(12);

        return view('frontend.attentions.index', compact('attentions'));
    }

}
