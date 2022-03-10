<?php

namespace App\Http\Requests;

use App\Models\Aya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAyaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('aya_create');
    }

    public function rules()
    {
        return [
            'aya' => [
                'string',
                'required',
            ],
            'number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'surah_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
