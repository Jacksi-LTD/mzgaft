<?php

namespace App\Http\Controllers\Api\V2;

use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Godname;

class GodNamesApiController extends Controller
{
    public function index()
    {
        $god_name = Godname::query()->get();
        return JsonResponse::success($god_name->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'audio_file' => $item->audio ?? "", // TODO: ensure audio field exists in Godname model
                'description' => $item->details,
            ];
        }));
    }
}
