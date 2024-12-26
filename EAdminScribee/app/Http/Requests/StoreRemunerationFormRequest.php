<?php

namespace App\Http\Requests;

use App\RemunerationForm;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreRemunerationFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('remuneration_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'examiner' => [
                'required',
                'string',
                'max:255',
            ],
            'term' => [
                'required',
                'string',
                'in:Mid,Final',
            ],
            'year' => [
                'required',
                // 'digits:4',
                'integer',
            ],
            'batch' => [
                'required',
                'string',
            ],
            'exam_type' => [
                'required',
                'in:regular,supplementary',
            ],
            'exam_date_theory' => [
                'nullable',
                'date',
            ],
            'exam_date_practical' => [
                'nullable',
                'date',
            ],
            'ref' => [
                'required',
                'string',
            ],
            'date' => [
                'required',
                'date',
            ],
            'subject' => [
                'required',
                'string',
            ],
            'quantity1' => ['nullable', 'integer', 'min:0'],
            'rate1' => ['nullable', 'numeric', 'min:0'],
            'amount1' => ['nullable', 'numeric', 'min:0'],
            'quantity2' => ['nullable', 'integer', 'min:0'],
            'rate2' => ['nullable', 'numeric', 'min:0'],
            'amount2' => ['nullable', 'numeric', 'min:0'],
            'quantity3' => ['nullable', 'integer', 'min:0'],
            'rate3' => ['nullable', 'numeric', 'min:0'],
            'amount3' => ['nullable', 'numeric', 'min:0'],
            'quantity4' => ['nullable', 'integer', 'min:0'],
            'rate4' => ['nullable', 'numeric', 'min:0'],
            'amount4' => ['nullable', 'numeric', 'min:0'],
            'quantity5' => ['nullable', 'integer', 'min:0'],
            'rate5' => ['nullable', 'numeric', 'min:0'],
            'amount5' => ['nullable', 'numeric', 'min:0'],
            'quantity6' => ['nullable', 'integer', 'min:0'],
            'rate6' => ['nullable', 'numeric', 'min:0'],
            'amount6' => ['nullable', 'numeric', 'min:0'],
            'quantity7' => ['nullable', 'integer', 'min:0'],
            'rate7' => ['nullable', 'numeric', 'min:0'],
            'amount7' => ['nullable', 'numeric', 'min:0'],
            'quantity8' => ['nullable', 'integer', 'min:0'],
            'rate8' => ['nullable', 'numeric', 'min:0'],
            'amount8' => ['nullable', 'numeric', 'min:0'],
            'quantity9' => ['nullable', 'integer', 'min:0'],
            'rate9' => ['nullable', 'numeric', 'min:0'],
            'amount9' => ['nullable', 'numeric', 'min:0'],
            'in_words' => [
                'required',
                'string',
            ],
            'total_amount' => [
                'required',
                'numeric',
                'gt:0',
            ],
            'deduction' => [
                'nullable',
                'numeric',
                'min:0',
            ],
            'net_amount' => [
                'required',
                'numeric',
                'gt:0',
            ],
        ];
    }
}
