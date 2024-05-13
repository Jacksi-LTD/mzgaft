<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AudioResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'content'  => $this->content,
            'category'  =>  @$this->category->name,
            'teacher'  =>  @$this->writer->name,
            'image'  =>  @$this->image,
            'files'  =>  AudioFilesResource::collection(@$this->files),
        ];
    }
}
