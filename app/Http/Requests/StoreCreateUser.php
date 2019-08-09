<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateUser extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alpha_dash|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => ":attribute không được để trống",
            'email' => ":attribute không đúng định dạng",
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute tối thiểu :min ký tự'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
