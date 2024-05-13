<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\Admin\QuestionResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\QuationsResource;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsApiController extends Controller
{


    public function index()
    {
        $questions=  Question::query()->where('approved',true)
            ->when(request()->filled('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request()->filled('subcategory_id'), function ($query) {
                return $query->where('sub_id', request('subcategory_id'));
            })
            ->paginate(6);

        return JsonResponse::success(QuationsResource::collection($questions));
    }

    public function categories(){

      $cats=Category::where('type','questions')->where('category_id',null)->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }

    public function sub_categories($id){
        $quetions=Question::where('category_id',$id)->where('approved',1)->paginate(6);
        $subcats=Category::where('type','questions')->where('category_id',$id)->get();
        return JsonResponse::success(['sub_categories'=>CategoryResource::collection($subcats),'questions'=>QuationsResource::collection($quetions)]);
    }


    public function show(Question $question)
    {
        return JsonResponse::success(QuestionResource::make($question));
    }




}
