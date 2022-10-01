<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['writer', 'category', 'created_by', 'media'])->paginate();

        $people = Person::get();

        $categories = Category::where(['type'=> 'blogs','category_id'=>null])->orderBy('id', 'DESC')->get();
        $users = User::get();

        return view('frontend.blogs.index', compact('blogs', 'categories', 'people', 'users'));
    }

    public function category(Category $category)
    {
        $some_blogs = Blog::with(['writer', 'category', 'created_by', 'media'])->favorite()->orderBy('id', 'DESC')->get();

        $blogs = Blog::with(['writer', 'category', 'created_by', 'media'])->where('category_id', $category->id)->paginate();

        return view('frontend.blogs.category', compact('blogs', 'some_blogs', 'category'));
    }

    public function show(Blog $blog)
    {
        $blog->load('writer', 'category', 'created_by');

        return view('frontend.blogs.show', compact('blog'));
    }
}
