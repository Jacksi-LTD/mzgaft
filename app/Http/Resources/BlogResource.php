<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->content,
            'image' => $this->image,
            'writing_date' => $this->writing_date,
            'category_id' => $this->category_id,
        ];
    }
}
