<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AudioBooksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'content'  => $this->content,
            'category'  =>  @$this->category->name,
            'image'  =>  @$this->image,
            'files'  =>  AudioFilesResource::collection(@$this->audio),
        ];
    }
}
