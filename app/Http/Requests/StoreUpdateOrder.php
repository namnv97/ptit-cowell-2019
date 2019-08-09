<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreUpdateOrder extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'Họ tên không được để trống',
            'phone.required' => 'Số điện thoại không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'status.required' => 'Trạng thái đơn hàng không được để trống',
            'status.min' => 'Trạng thái đơn hàng không được để trống',
        ];
    }
}
