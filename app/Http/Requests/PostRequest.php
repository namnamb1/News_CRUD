<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2048',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'Tên không được để trống',
            'title.max' => 'Tên không được quá 255 kí tự',
            'content.required' => 'Nội dung không được để trống',
            'image.mimes' => 'Định dạng ảnh không hợp lệ',
            'image.max' => 'Kính thước ảnh không được vượt quá 2048',
            'category.required' => 'Danh mục không được để trống'
        ];
    }
}
