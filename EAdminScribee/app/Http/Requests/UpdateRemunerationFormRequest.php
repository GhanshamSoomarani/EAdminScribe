<?php

namespace App\Http\Requests;

use App\RemunerationForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRemunerationFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('remuneration_form_edit') || !in_array($this->route()->remuneration_form->status_id, [6, 7]),
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return true;
    }

    public function rules()
    {
        return [
            'total_amount' => [
                'required',
            ],
        ];
    }
}
