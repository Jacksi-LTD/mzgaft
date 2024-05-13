<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuationsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'question'  => $this->title,
            'answer'  => $this->answer,
            'category'  => @$this->category->name,
            'subcategory'  => @$this->sub->name,
        ];
    }
}
