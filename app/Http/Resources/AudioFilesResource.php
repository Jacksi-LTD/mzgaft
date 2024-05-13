<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AudioFilesResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            'file_name'  => $this->file_name,
            'uuid'  => $this->uuid,
            'original_url'  => $this->original_url,
            'extension'  => $this->extension,
            'size'  =>  $this->size,
        ];
    }
}
