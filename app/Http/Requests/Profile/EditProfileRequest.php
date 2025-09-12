<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'name' => 'required|string|max:20',
            'bio' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前を記入してください',
            'name.string' => '名前は文字列で入力してください',
            'name.max' => '名前は:max文字以内で入力してください。',
            'bio.required' => '自己紹介を記入してください',
            'bio.string' => '自己紹介は文字列で入力してください',
            'bio.max' => '自己紹介は:max文字以内で入力してください。',
        ];
    }
}
