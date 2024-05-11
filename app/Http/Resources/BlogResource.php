<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'writing_date'  => $this->writing_date,
            'content'  => $this->content,
            'category_id'  =>  $this->category_id,
            'image'  =>  $this->image,

        ];
    }
}
