<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreOptionsFooter extends FormRequest
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
            'ctft1' => 'required',
            'ctft2' => 'required',
            'ctft3' => 'required',
            'facebook' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ctft1.required' => 'Nội dung 1 không được để trống',
            'ctft2.required' => 'Nội dung 2 không được để trống',
            'ctft3.required' => 'Nội dung 3 không được để trống',
            'facebook.required' => 'Fanpage Facebook không được để trống'
        ];
    }
}
