<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HadithResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'content'  => $this->details,
            'category'  =>  @$this->category->name,
            'chapter'  =>  @$this->chapter->title,
            'number'=>$this->number,
            'narrated_by'=>$this->narrated_by,
        ];
    }
}
