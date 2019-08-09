<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVendor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|unique:vendors'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nhà sản xuất không được để trống',
            'name.unique' => 'Nhà sản xuất đã tồn tại'
        ];
    }
}
