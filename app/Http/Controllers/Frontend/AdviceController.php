<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Attention;
use Symfony\Component\HttpFoundation\Response;

class AdviceController extends Controller
{
    public function index()
    {

        $advices = Advice::orderBy('id','desc')->paginate(12);

        return view('frontend.advice.index', compact('advices'));
    }

}
