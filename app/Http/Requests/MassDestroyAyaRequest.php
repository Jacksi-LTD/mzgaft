<?php

namespace App\Http\Requests;

use App\Models\Aya;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAyaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('aya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ayas,id',
        ];
    }
}
