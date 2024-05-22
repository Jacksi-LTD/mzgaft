<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Godname;
use App\Models\Person;
use App\Models\Plead;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class NamesController extends Controller
{
    public function index()
    {
        // $categories = Category::where('type', 'books')->orderBy('created_at', 'DESC')->get();
        $god_names = Godname::orderBy('created_at', 'DESC')->paginate(12);

        return view('frontend.god_names.index', compact('god_names'));
    }


    public function show($id)
    {
        $godname=Godname::findOrFail($id);
        return view('frontend.god_names.show', compact('godname'));
    }
}
