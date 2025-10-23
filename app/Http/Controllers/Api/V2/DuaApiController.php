<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plead;

class DuaApiController extends Controller
{
    public function index()
    {
        $pleads = Plead::query()->get();
        return JsonResponse::success($pleads->map(function ($plead) {
            return [
                'id' => $plead->id,
                'title' => $plead->title,
                'description' => $plead->details,
                "audio_file" => $plead->audio_file ?? "",
            ];
        }));
    }

    public function show($id)
    {
        $plead = Plead::query()->find($id);
        if (!$plead) {
            return JsonResponse::fail("Plead not found", 404);
        }
        return JsonResponse::success([
            'id' => $plead->id,
            'title' => $plead->title,
            'description' => $plead->details,
            "audio_file" => $plead->audio_file ?? "",   
            "category" => $plead->category->name,
        ]);
    }

    public function categories()
    {
        $categories = Category::where('type', 'pleads')->get();
        return JsonResponse::success($categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->name,
            ];
        }));
    }

    public function showCategories($id)
{    
        $category = Category::query()->where('type', 'pleads')->find($id);
        if (!$category) {
            return JsonResponse::fail("Category not found", 404);
        }
        return JsonResponse::success([
            'id' => $category->id,
            'title' => $category->name,
            "duas" => Plead::query()
                ->where('category_id', $category->id)
                ->get()
                ->map(function ($plead) {
                    return [
                        'id' => $plead->id,
                        'title' => $plead->title,
                        'description' => $plead->details,
                        "audio_file" => $plead->getMedia('audio_file')->first()->url ?? "",
                    ];
                })
        ]);
    }  
}
