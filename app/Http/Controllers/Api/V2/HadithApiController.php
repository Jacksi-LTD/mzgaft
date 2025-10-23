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
use App\Http\Resources\ChapterResource;
use App\Http\Resources\HadithResource;
use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Hadith;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HadithApiController extends Controller
{


    public function index()
    {
        $hadith = Hadith::query()
            ->when(request()->filled('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })
            ->when(request()->filled('chapter_id'), function ($query) {
                return $query->where('chapter_id', request('chapter_id'));
            })
            ->when(request()->filled('search'), function ($query) {
                return $query->where('details', 'LIKE', '%' . request('search') . '%');
            })
            ->paginate(6);

        //$books=Book::where('approved',true)->orderBy('id','desc')->paginate(6);
        return JsonResponse::success(HadithResource::collection($hadith));
    }

    public function show(Hadith $hadith)
    {
        return JsonResponse::success(HadithResource::make($hadith));
    }

    public function categories()
    {

        $cats = Category::where('type', 'hadith')->get();
        return JsonResponse::success(CategoryResource::collection($cats));
    }

    public function chapters($id)
    {

        $chapters = Chapter::where('cat_id', $id)->get();
        return JsonResponse::success(ChapterResource::collection($chapters));
    }

}
