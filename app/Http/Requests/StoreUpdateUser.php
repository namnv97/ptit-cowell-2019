<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
        $arr = [];
        $arr['name'] = 'required';
        $arr['password'] = 'nullable|alpha_dash|min:8';
        return $arr;
    }

    public function messages()
    {
        $arr = [];
        $arr['required'] = ':attribute không được để trống';
        $arr['min'] = ':attribute tối thiểu :min ký tự';
        return $arr;
    }

    public function attributes()
    {
        $arr = [];
        $arr['name'] = "Họ tên";
        $arr['password'] = 'Mật khẩu';
        return $arr;
    }
}
