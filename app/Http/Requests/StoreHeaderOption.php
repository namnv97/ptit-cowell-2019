<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeaderOption extends FormRequest
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
            'logo' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Ảnh logo không được để trống',
            'phone.required' => 'Số điện thoại không được để trống'
        ];
    }
}
