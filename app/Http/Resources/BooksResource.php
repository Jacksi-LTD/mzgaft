<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'content'  => $this->content,
            'category'  =>  @$this->category->name,
            'writer'  =>  @$this->writer->name,
            'image'  =>  @$this->image,
            'file'  =>  @$this->file->getUrl(),
        ];
    }
}
