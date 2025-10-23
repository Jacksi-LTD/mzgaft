<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->content,
            "language" => $this->language ?? "ar", // TODO: Add language column in books table
            'cover_image' => @$this->image?->getUrl(),
            'category' => @$this->category->name,
            'writer' => @$this->writer->name,
            'audio_file' => @$this->audio_file,
            "pdf_file" => @$this->file?->getUrl(),
            'views' => $this->visits ?? 0,
        ];
    }
}
