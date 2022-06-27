<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {

        // $categories = Category::where('type', 'books')->get();
        $categories = Category::where(['type'=> 'books','category_id'=>null])->get();

        return view('frontend.books.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $books = Book::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->paginate();

        $some_books = Book::with(['writer', 'category', 'created_by', 'media'])->get();

        return view('frontend.books.category', compact('books', 'category', 'some_books'));
    }

    public function index2()
    {
        $books = Book::with(['writer', 'category', 'created_by', 'media'])->get();

        $people = Person::get();

        $categories = Category::get();

        $users = User::get();

        return view('frontend.books.index', compact('books', 'categories', 'people', 'users'));
    }

    public function show(Book $book)
    {
        if(isset($book->visits)){
            Book::find($book->id)->increment('visits');
        }else{
            $book->visits = 1;
            $book->save();
        }

        $book->load('writer', 'category', 'created_by', 'media.model');

        return view('frontend.books.show', compact('book'));
    }
}
