<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'image' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|string|max:20',
            'bio' => 'required|string|max:200',
        ];
    }

    public function messages()
    {
        return [
            'image.file' => '画像ファイルを選択してください。',
            'image.mimes' => '画像は JPEG, PNG, GIF のいずれかでアップロードしてください。',
            'image.max' => '画像のサイズは2MB以内にしてください。',
            'name.required' => '名前を記入してください',
            'name.string' => '名前は文字列で入力してください',
            'name.max' => '名前は:max文字以内で入力してください。',
            'bio.required' => '自己紹介を記入してください',
            'bio.string' => '自己紹介は文字列で入力してください',
            'bio.max' => '自己紹介は:max文字以内で入力してください。',
        ];
    }
}
