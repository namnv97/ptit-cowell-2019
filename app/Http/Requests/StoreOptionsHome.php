<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionsHome extends FormRequest
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
            'cate_home' => 'required',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'reddot1' => 'required',
            'reddot2' => 'required',
            'reddot3' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cate_home.required' => 'Chọn danh mục để hiển thị ở trang chủ',
            'image1.required' => 'Ảnh 1 mục tiêu không được để trống',
            'image2.required' => 'Ảnh 2 mục tiêu không được để trống',
            'image3.required' => 'Ảnh 3 mục tiêu không được để trống',
            'reddot1.required' => 'Nội dung mục tiêu không được để trống',
            'reddot2.required' => 'Nội dung mục tiêu không được để trống',
            'reddot3.required' => 'Nội dung mục tiêu không được để trống'
        ];
    }
}
