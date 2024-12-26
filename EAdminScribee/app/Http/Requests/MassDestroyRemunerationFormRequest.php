<?php

namespace App\Http\Requests;

use App\RemunerationForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRemunerationFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('remuneration_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:remuneration_forms,id',
        ];
    }
}
