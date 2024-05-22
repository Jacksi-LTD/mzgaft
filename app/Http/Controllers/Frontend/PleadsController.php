<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\Plead;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PleadsController extends Controller
{
    public function index()
    {
        // $categories = Category::where('type', 'books')->orderBy('created_at', 'DESC')->get();
        $pleads = Plead::orderBy('created_at', 'DESC')->paginate(12);

        return view('frontend.pleads.index', compact('pleads'));
    }


    public function show(Plead $plead)
    {

        return view('frontend.pleads.show', compact('plead'));
    }
}
