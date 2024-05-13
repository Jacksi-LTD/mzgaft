<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BooksResource;
use App\Http\Resources\CategoryResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BooksApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $books=  Book::query()->where('approved',true)
            ->when(request()->filled('most_read'), function ($query) {
                return $query->orderBy('visits', 'desc');
            })
            ->when(request()->filled('recent'), function ($query) {
                return $query->orderBy('id', 'desc');
            })
            ->paginate(6);

        //$books=Book::where('approved',true)->orderBy('id','desc')->paginate(6);
        return JsonResponse::success(BooksResource::collection($books));
    }

    public function show(Book $book)
    {
        return JsonResponse::success(BooksResource::make($book));
    }

     /*
    public function categories(){

      $cats=Category::where('type','blogs')->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }




    public function by_category($id){

        $blogs=Blog::where('category_id',$id)->orderBy('id','desc')->get();
        return JsonResponse::success(BlogResource::collection($blogs));
    }*/


}
