<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'newPost' => 'required|string|max:100|regex:/[^\s　]/',
        ];
    }

    public function messages()
    {
        return [
            'newPost.required' => '投稿内容は必須です。',
            'newPost.string' => '投稿内容は文字列で入力してください。',
            'newPost.max' => '投稿内容は100文字以内で入力してください。',
            'newPost.regex' => '投稿内容は必須です。',
        ];
    }
}
