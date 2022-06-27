<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateArticleRequest extends FormRequest
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
        $rules = [
            'topic' => ['required', 'unique:articles,topic'],
            'body' => ['required'],
            'tags' => ['nullable']
        ];
        // if (!\is_null($this->file('image'))) {
        //     $rules['image'] = ['mimes:png,jpg,jpeg'];
        // }
        return $rules;
    }
}
