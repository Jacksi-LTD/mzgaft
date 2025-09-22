<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Models\Blog;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        return JsonResponse::success(BlogResource::collection($blogs));
    }


    public function categories()
    {

        $cats = Category::where('type', 'blogs')->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }


    public function show(Blog $blog)
    {
        return JsonResponse::success(BlogResource::make($blog));
    }

    public function by_category($id)
    {

        $blogs = Blog::where('category_id', $id)->orderBy('id', 'desc')->get();
        return JsonResponse::success(BlogResource::collection($blogs));
    }
}
