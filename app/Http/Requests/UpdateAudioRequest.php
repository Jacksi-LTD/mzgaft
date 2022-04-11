<?php

namespace App\Http\Requests;

use App\Models\Audio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Spatie\MediaLibraryPro\Rules\Concerns\ValidatesMedia;

class UpdateAudioRequest extends FormRequest
{
    use ValidatesMedia;

    public function authorize()
    {
        return Gate::allows('audio_edit');
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
                $this->validateMultipleMedia()
                ->itemName('required')->customProperty('extra_field', 'required|max:30'),
                ],
            'images' => [
                $this->validateMultipleMedia()
                ->itemName('required'),            ],
        ];
    }
}
