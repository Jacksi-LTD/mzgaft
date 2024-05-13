<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\AdviceResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PagesResource;
use App\Models\Advice;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PagesApiController extends Controller
{


    public function index()
    {
        $pages=Page::all();
        return JsonResponse::success(PagesResource::collection($pages));
    }




    public function show(Page $page)
    {
        return JsonResponse::success(PagesResource::make($page));
    }




}
