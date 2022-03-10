<?php

namespace App\Http\Requests;

use App\Models\Audio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAudioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('audio_create');
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
            'files' => [
                'array',
            ],
            'images' => [
                'array',
            ],
        ];
    }
}
