<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|string|max:50|regex:/^[A-Za-z ]+$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'カテゴリを記入してください',
            'name.string' => 'カテゴリは文字列で入力してください',
            'name.max' => 'カテゴリは:max文字以内で入力してください。',
            'name.regex' => 'カテゴリは英語のみで入力してください。',
        ];
    }
}
