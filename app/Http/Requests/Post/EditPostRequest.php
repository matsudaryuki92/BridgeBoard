<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title' => 'required|max:50',
            'contents' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを記入してください',
            'title.string' => 'タイトルは文字列で入力してください',
            'title.max' => 'タイトルは:max文字以内で入力してください。',
            'contents.required' => '投稿内容を記入してください',
            'contents.string' => '投稿内容は文字列で入力してください',
            'contents.max' => '投稿内容は:max文字以内で入力してください。',
        ];
    }
}
