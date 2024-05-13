<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChapterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'name'  => $this->title,
            'category_id'  => $this->cat_id,
        ];
    }
}
