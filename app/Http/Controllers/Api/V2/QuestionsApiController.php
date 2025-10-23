<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\QuestionResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\QuationsResource;
use App\Models\Category;
use App\Models\Question;

class QuestionsApiController extends Controller
{


    public function index()
    {
        $questions = Question::query()->where('approved', true)
            ->when(request()->filled('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request()->filled('subcategory_id'), function ($query) {
                return $query->where('sub_id', request('subcategory_id'));
            })
            ->paginate(6);

        return JsonResponse::success(QuationsResource::collection($questions));
    }

    public function categories()
    {

        $cats = Category::where('type', 'questions')->where('category_id', null)->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }

    public function sub_categories($id)
    {
        $quetions = Question::where('category_id', $id)->where('approved', 1)->paginate(6);
        $subcats = Category::where('type', 'questions')->where('category_id', $id)->get();
        return JsonResponse::success(['questions' => QuationsResource::collection($quetions), 'sub_categories' => CategoryResource::collection($subcats)]);
    }
    
    public function show(Question $question)
    {
        return JsonResponse::success(QuationsResource::make($question));
    }

}
