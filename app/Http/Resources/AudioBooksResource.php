<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AudioBooksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => @$this->category->name,
            'cover_image' => @$this->image?->getUrl(),
            'files' => AudioFilesResource::collection(@$this->audio),
        ];
    }
}
