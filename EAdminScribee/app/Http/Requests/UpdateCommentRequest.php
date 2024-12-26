<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'remuneration_form_id' => [
                'required',
                'integer',
            ],
            'user_id'             => [
                'required',
                'integer',
            ],
            'comment_text'        => [
                'required',
            ],
        ];
    }
}
