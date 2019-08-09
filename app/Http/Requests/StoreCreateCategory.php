<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateCategory extends FormRequest
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
            'description' => 'required',
            'slug' => 'required|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'description.required' => 'Mô tả danh mục không được để trống',
            'slug.required' => 'Đường dẫn danh mục không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại'
        ];
    }

}
