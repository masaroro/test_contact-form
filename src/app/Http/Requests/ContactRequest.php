<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    public function authorize()
    {
        // return false;
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'gender' => 'required',
            'email' => 'required|string|email|max:255',
            'tel_first' => 'required|numeric|digits_between:1,5',
            'tel_second' => 'required|numeric|digits_between:1,5',
            'tel_third' => 'required|numeric|digits_between:1,5',
            'address' => 'required|string|max:50',
            'building' => 'nullable|string|max:50',
            'category_id' => 'required',
            'detail' => 'required|string|max:120',
        ];
    }

    public function messages(){
        return [
            'first_name.required' => `姓を入力してください`,
            'last_name.required' => `名を入力してください`,
            'gender.required' => `性別を選択してください`,
            'email.required' => `メールアドレスを入力してください`,
            'email.email' => `メールアドレスはメール形式で入力してください`,
            'tel_first.required' => `電話番号を入力してください`,
            'tel_first.digits_between' => `電話番号は5桁までの数字で入力してください`,
            'tel_second.required' => `電話番号を入力してください`,
            'tel_second.digits_between' => `電話番号は5桁までの数字で入力してください`,
            'tel_third.required' => `電話番号を入力してください`,
            'tel_third.digits_between' => `電話番号は5桁までの数字で入力してください`,
            'address.required' => `住所を入力してください`,
            'category_id.required' => `お問い合わせの種類を選択してください`,
            'detail.required' => `お問い合わせ内容を入力してください`,
            'detail.required' => `お問合せ内容は120文字以内で入力してください`,
        ];
    }

}
