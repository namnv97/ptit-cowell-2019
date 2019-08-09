<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreCreateOrder extends FormRequest
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
            'phone' =>'required',
            'address' => 'required',
            'id' => 'required',
            'quantity' => 'required',
            'total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống'
        ];
    }

    public function attributes(){
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'id' => 'Sản phẩm',
            'quantity' => 'Số lượng',
            'total' => 'Tổng đơn hàng'
        ];
    }
}
