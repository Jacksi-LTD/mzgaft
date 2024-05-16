<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'name'  => $this->name,
            'description'  => $this->details,
            'category'  =>  @$this->category->name,
            'price'  =>  @$this->price,
            'image'  =>  @$this->image,
        ];
    }
}
