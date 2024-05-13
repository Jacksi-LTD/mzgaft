<?php

namespace App\Http\Requests\Api;

use App\Models\AudioBook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class SuggestionRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'details' => [
                'string',
                'required',
            ],
            'phone' => [
                'required',
            ]
        ];
    }
}
