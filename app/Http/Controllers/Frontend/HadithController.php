<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Hadith;
use App\Models\Person;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class HadithController extends Controller
{
    public function index()
    {
        // $categories = Category::where('type', 'books')->orderBy('created_at', 'DESC')->get();
        $categories = Category::where(['type'=> 'hadith','category_id'=>null])->get();

        return view('frontend.hadith.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $subcats=Chapter::where('cat_id',$category->id)->get();
        $hadith = Hadith::with(['category'])->where('category_id', $category->id)->paginate();

        //$some_books = Hadith::with( 'category')->orderBy('created_at', 'DESC')->get();

        return view('frontend.hadith.category', compact('hadith', 'category','subcats'));
    }

    public function subcategory($category){
       $subcategory=Chapter::findOrFail($category);
        $subcats=Chapter::where('cat_id',$subcategory->cat_id)->get();
        $hadith = Hadith::with(['category','chapter'])->where('chapter_id', $subcategory->id)->paginate();
        return view('frontend.hadith.category', compact('hadith', 'category','subcats','subcategory'));
    }



    public function show($id)
    {
        $show=Hadith::findOrFail($id);
        //$book->load('writer', 'category', 'created_by', 'media.model');

        return view('frontend.hadith.show', compact('show'));
    }
}
