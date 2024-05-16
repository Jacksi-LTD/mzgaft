<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\TajweeedResource;
use App\Models\Tajweed;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TajweedApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $prayers=  Tajweed::paginate(6);

        //$books=Book::where('approved',true)->orderBy('id','desc')->paginate(6);
        return JsonResponse::success(TajweeedResource::collection($prayers));
    }

    public function show(Tajweed $tajweed)
    {
        return JsonResponse::success(TajweeedResource::make($tajweed));
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
