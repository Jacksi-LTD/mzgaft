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
use App\Http\Resources\YoutubeResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\YoutubeVideo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YoutubeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $videos=  YoutubeVideo::query()->where('approved',true)
            ->when(request()->filled('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->paginate(6);

        //$books=Book::where('approved',true)->orderBy('id','desc')->paginate(6);
        return JsonResponse::success(YoutubeResource::collection($videos));
    }

    public function show(YoutubeVideo $youtubeVideo)
    {
        return JsonResponse::success(YoutubeResource::make($youtubeVideo));
    }


    public function categories(){

      $cats=Category::where('type','youtubevideos')->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }





}
