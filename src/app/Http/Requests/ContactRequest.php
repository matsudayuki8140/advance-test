<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'sei' => ['required', 'string', 'max:255'],
            'mei' => ['required', 'string', 'max:255'],
            'fullname' => ['nullable', 'string', 'max:255'],
            'gender' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'max:8', 'min:8', 'regex:/^([0-9０-９]{3}(-|－)[0-9０-９]{4})$/u'],
            'address' => ['required', 'string', 'max:255'],
            'building_name' => ['nullable', 'string', 'max:255'],
            'opinion' => ['required', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'sei.required' => '入力してください',
            'sei.string' => '文字列で入力してください',
            'sei.max' => '255文字以下で入力してください',
            'mei.required' => '入力してください',
            'mei.string' => '文字列で入力してください',
            'mei.max' => '255文字以下で入力してください',
            'email.required' => '入力してください',
            'email.string' => '文字列で入力してください',
            'email.email' => '有効なメールアドレス形式を入力してください',
            'email.max' => '255文字以下で入力してください',
            'postcode.required' => '入力してください',
            'postcode.max' => '000-0000の形式で入力してください',
            'postcode.min' => '000-0000の形式で入力してください',
            'postcode.regex' => '000-0000の形式で入力してください',
            'address.required' => '入力してください',
            'address.string' => '文字列で入力してください',
            'address.max' => '255文字以下で入力してください',
            'building_name.string' => '文字列で入力してください',
            'building_name.max' => '255文字以下で入力してください',
            'opinion.required' => '入力してください',
            'opinion.max' => '120文字以下で入力してください'
        ];
    }
}
