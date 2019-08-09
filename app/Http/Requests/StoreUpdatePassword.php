<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class StoreUpdatePassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'oldpassword' => 'required|min:8',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute tối thiểu :min ký tự',
            'confirmed' => ':attribute xác nhận không chính xác'
        ];
    }

    public function attributes()
    {
        return [
            'oldpassword' => 'Mật khẩu cũ',
            'password' => 'Mật khẩu'
        ];
    }
}
