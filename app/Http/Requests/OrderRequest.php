<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'phone' => 'required|numeric|regex:/^[a-zA-Z0-9 ]+$/',
            'neighborhood'=>'required',
            'address'=>'required',
            'bill_total'=>'required',
            'payment_type'=>'required',
            'order_type'=>'required',


        ];
    }
    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب',
            'phone.regex'=>'الرجاء كتابة ارقام انجليزيه فقط',
            'phone.max'=>'رقم الهاتف طويل الرجاء عدم كتابة المفتاح',
        ];
    }
}
