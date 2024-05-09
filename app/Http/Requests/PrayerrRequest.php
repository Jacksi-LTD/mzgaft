<?php

namespace App\Http\Requests;

use App\Models\AudioBook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class PrayerrRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
