<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\MuslimFortressResource;
use App\Models\Category;
use App\Models\MuslimFortress;
use Illuminate\Http\Request;

class MuslimFortressApiController extends Controller
{
    public function index(Request $request)
    {
        $query = MuslimFortress::with(['category'])->orderBy('created_at', 'desc');

        // Filter by category if provided
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $muslimFortresses = $query->paginate(20);

        return MuslimFortressResource::collection($muslimFortresses);
    }

    public function show($id)
    {
        $muslimFortress = MuslimFortress::with(['category'])->findOrFail($id);
        return new MuslimFortressResource($muslimFortress);
    }

    public function categories()
    {
        $categories = \App\Models\Category::where('type', 'muslim_fortress')
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function showCategories($id)
    {
        $category = Category::where('type', 'muslim_fortress')->find($id);
        if (!$category) {
            return JsonResponse::fail("Category not found", 404);
        }
        return JsonResponse::success([
            'id' => $category->id,
            'title' => $category->name,
            "muslim_fortresses" => MuslimFortress::query()
                ->where('category_id', $category->id)
                ->get()
                ->map(function ($muslimFortress) {
                    return [
                        'id' => $muslimFortress->id,
                        'title' => $muslimFortress->title,
                        'description' => $muslimFortress->content,
                    ];
                })
        ]);
    }
}