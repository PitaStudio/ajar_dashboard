<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required',
            'user_type'=>'required',
            'contact'=>'required',
            'image'=>'required_without:id|mimes:jpeg,png,jpg,gif',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'هذا الحقل مطلوب'
        ];
    }
}
