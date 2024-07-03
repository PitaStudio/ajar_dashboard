<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'region_id'=>'required',
            'user_id'=>'required',
            'type'=>'required',
            'title'=>'required',
            'city_id'=>'required',
            'category_id'=>'required',
            'car_type'=>'required',
            'model'=>'required',
            'size'=>'required',
            'price'=>'required',
            'address'=>'required',
            'details'=>'required',
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
