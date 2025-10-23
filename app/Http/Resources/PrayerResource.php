<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrayerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'title'  => $this->title,
            'image'  =>  @$this->image,
            'file'  =>  $this->getMedia('file')->map(function ($media) {
                return $media->getUrl();
            }),
        ];
    }
}
