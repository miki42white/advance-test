<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'lastname' => 'required',
            'firstname'=>'required',
            'gender' => 'required',
            'email' => 'required|email',
            'zip11' => 'required|max:8',
            'addr11' => 'required',
            'building_name'=>'nullable',
            'opinion'  => 'required|max:120',
        ];
    }
    public function messages()
    {
        return [
            'lastname.required' => '名前を入力してください',
            'firstname.required' => '名前を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'zip11.numeric' => '郵便番号は数値で入力してください',
            'zip11.max:8' => '郵便番号は8文字以内で入力してください',
            'addr11.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください'
        ];
    }
    
    // protected function getRedirectUrl()
    // {
    //     return 'confirm';
    // }
}
