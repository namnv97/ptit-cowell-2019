<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateProduct extends FormRequest
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
            'slug' => 'required|unique:products',
            'description' => 'required',
            'vendor_id' => 'required|numeric|min:1',
            'price' => 'required',
            'quantity' => 'required',
            'cate_id' => 'required|min:1',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được để trống',
            'numeric' => ':attribute phải là dạng số',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả',
            'vendor_id' => 'Nhà sản xuất',
            'price' => 'Giá',
            'quantity' => 'Số lượng',
            'cate_id' => 'Danh mục',
            'image' => 'Ảnh sản phẩm',
            'slug' => 'Đường dẫn sản phẩm'
        ];
    }
}
