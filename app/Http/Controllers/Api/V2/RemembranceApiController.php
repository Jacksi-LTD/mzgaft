<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Remembrance;

class RemembranceApiController extends Controller
{
    public function categories()
    {
        $categories = Category::where('type', 'remembrance')->get();
        return JsonResponse::success($categories->map(function ($category) {
            return [
                'id' => $category->id,
                'title' => $category->name,
                "azkar" => Remembrance::query()
                    ->where('category_id', $category->id)
                    ->orderBy("sort", "asc")
                    ->get()
                    ->map(function ($remembrance) {
                        return [
                            'id' => $remembrance->id,
                            'title' => $remembrance->title,
                            'description' => $remembrance->content,
                            "audio_file" => $remembrance->audio ?? "", // TODO: ensure audio field exists in Remembrance model
                            'repet' => $remembrance->repet,
                            "sort" => $remembrance->sort,
                        ];
                    })
            ];
        }));
    }

    public function showCategories($id)
    {
        $category = Category::query()->where('type', 'remembrance')->find($id);
        if (!$category) {
            return JsonResponse::fail("Category not found", 404);
        }
        return JsonResponse::success([
            'id' => $category->id,
            'title' => $category->name,
            "azkar" => Remembrance::query()
                ->where('category_id', $category->id)
                ->orderBy("sort", "asc")
                ->get()
                ->map(function ($remembrance) {
                    return [
                        'id' => $remembrance->id,
                        'title' => $remembrance->title,
                        'description' => $remembrance->content,
                        "audio_file" => $remembrance->audio ?? "",  // TODO: ensure audio field exists in Remembrance model
                        'repet' => $remembrance->repet,
                        "sort" => $remembrance->sort,
                    ];
                })
        ]);
    }

    public function azkars()
    {
        $azkars = Remembrance::query()->orderBy("sort", "asc")->get();
        return JsonResponse::success($azkars->map(function ($remembrance) {
            return [
                'id' => $remembrance->id,
                'title' => $remembrance->title,
                'description' => $remembrance->content,
                "audio_file" => $remembrance->audio ?? "",  // TODO: ensure audio field exists in Remembrance model
                'repet' => $remembrance->repet,
                "sort" => $remembrance->sort,
            ];
        }));
    }

    public function showAzkars($id)
    {
        $remembrance = Remembrance::query()->find($id);
        if (!$remembrance) {
            return JsonResponse::fail("Remembrance not found", 404);
        }
        return JsonResponse::success([
            'id' => $remembrance->id,
            'title' => $remembrance->title,
            'description' => $remembrance->content,
            "audio_file" => $remembrance->audio ?? "",  // TODO: ensure audio field exists in Remembrance model
            'repet' => $remembrance->repet,
            "sort" => $remembrance->sort,
        ]);
    }
}
