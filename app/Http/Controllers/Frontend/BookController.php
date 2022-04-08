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
        $books = Book::with(['writer', 'category', 'created_by', 'media'])->get();

        $people = Person::get();

        $categories = Category::get();

        $users = User::get();

        return view('frontend.books.index', compact('books', 'categories', 'people', 'users'));
    }

    public function show(Book $book)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->load('writer', 'category', 'created_by');

        return view('frontend.books.show', compact('book'));
    }
}
