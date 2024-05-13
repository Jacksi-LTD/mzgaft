<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id ,
            'amount'  => $this->amount,
            'bank'  => $this->bank,
            'trans_number'  =>  $this->trans_number,
            'image'  =>  $this->image,
        ];
    }
}
