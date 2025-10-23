<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\Plead;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PleadsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('type', 'pleads')->orderBy('created_at', 'DESC')->get();
        
        $query = Plead::with(['category'])->orderBy('created_at', 'DESC');
        
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }
        
        $pleads = $query->paginate(12);

        return view('frontend.pleads.index', compact('pleads', 'categories'));
    }


    public function show(Plead $plead)
    {
        $plead->load(['category']);

        return view('frontend.pleads.show', compact('plead'));
    }
}
