<?php

namespace App\Http\Requests;

use App\Models\AudioBook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHadithRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'details' => [
                'nullable',
            ],
            'category_id' => [
                'required',
            ],
            'chapter_id' => [
                'required',
            ]

        ];
    }
}
