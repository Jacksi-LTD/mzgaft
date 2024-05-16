<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TajweeedResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'image'  =>  @$this->image,
            'file'  =>  @$this->file,
        ];
    }
}
