<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginPost extends FormRequest
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
            'admin_name' => 'required',
           'pwd_confirmed'=>'same:pwd',
        ];
    }

    public function messages(){
        return[
        'admin_name.required'=>"用户名必填",
        'pwd.required'=>"密码必填",
        ];
    }
}
