<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuationsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->answer,
            "audio_file" => $this->audio ?? "", // TODO: Add audio file handling in questions model
            "teacher_id" => $this->teacher_id ?? null,
            'category' => @$this->category->name,
            'subcategory' => @$this->sub->name,
        ];
    }
}
