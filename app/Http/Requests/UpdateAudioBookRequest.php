<?php

namespace App\Http\Requests;

use App\Models\AudioBook;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAudioBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('audio_book_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'file' => [
                'array',
            ],
            'audio' => [
                'array',
            ],
        ];
    }
}
