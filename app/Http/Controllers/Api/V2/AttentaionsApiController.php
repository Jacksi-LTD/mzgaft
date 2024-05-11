<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\AdviceResource;
use App\Http\Resources\AttentionsResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Models\Advice;
use App\Models\Attention;
use App\Models\Blog;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttentaionsApiController extends Controller
{


    public function index()
    {
        $attention=Attention::orderBy('id','desc')->get();
        return JsonResponse::success(AttentionsResource::collection($attention));
    }




    public function show(Attention $attention)
    {
        return JsonResponse::success(AttentionsResource::make($attention));
    }




}
