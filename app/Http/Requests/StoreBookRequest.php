<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'nullable',
            ],
            'image' => [
                'nullable',
            ],
            'file' => [
                'nullable',
            ],
            'files' => [
                'array',
            ],
            'images' => [
                'array',
            ],
            'audio_file' => [
                'nullable',
            ],
        ];
    }
}
