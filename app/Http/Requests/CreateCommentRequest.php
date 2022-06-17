<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return \auth()->guest() ? [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'comment' => ['required', 'min:20', 'max:500']
        ] : [
            'comment' => ['required', 'min:20', 'max:500']
        ];
    }
}
