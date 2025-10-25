<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StorePleadCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:categories,name,NULL,id,type,pleads',
            ],
            'type' => [
                'required',
                'in:pleads',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name field is required.',
            'name.unique' => 'The category name has already been taken for pleads.',
            'type.required' => 'The category type field is required.',
            'type.in' => 'The category type must be either pleads.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'type' => 'pleads',
        ]);
    }
}