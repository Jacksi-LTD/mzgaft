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
use App\Models\Advice;
use App\Models\Blog;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdviceApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $advices=Advice::orderBy('id','desc')->get();
        return JsonResponse::success(AdviceResource::collection($advices));
    }




    public function show(Advice $advice)
    {
        return JsonResponse::success(AdviceResource::make($advice));
    }




}
