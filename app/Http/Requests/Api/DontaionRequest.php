<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class DontaionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'amount' => [
                'required',
            ],
            'bank' => [
                'string',
                'required',
            ],
            'trans_number' => [
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
