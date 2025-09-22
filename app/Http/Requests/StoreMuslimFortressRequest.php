<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMuslimFortressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'string',
                'required',
            ],
            'category_id' => [
                'nullable',
                'exists:categories,id',
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }
}