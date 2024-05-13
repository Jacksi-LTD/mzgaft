<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\AudioResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\BooksResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TeachersResource;
use App\Models\Audio;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AudioApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $audios=  Audio::query()->where('approved',true)
            ->when(request()->filled('writer_id'), function ($query) {
                return $query->where('writer_id', request('teacher_id'));
            })
            ->when(request()->filled('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->paginate(6);

        //$books=Book::where('approved',true)->orderBy('id','desc')->paginate(6);
        return JsonResponse::success(AudioResource::collection($audios));
    }

    public function show(Book $book)
    {
        return JsonResponse::success(BooksResource::make($book));
    }

    public function acoustics_teachers(){

        $teacthers=Person::where('type','audios')->get();
        return JsonResponse::success(TeachersResource::collection($teacthers));
    }


    public function categories(){

      $cats=Category::where('type','audios')->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }





}
