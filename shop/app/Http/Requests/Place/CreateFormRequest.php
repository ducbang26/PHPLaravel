<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'place_name' => 'required',
            'star' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'location' => 'required|max:255',
            'kinhDo' => 'required',
            'viDo' => 'required',
            'region' => 'required',
        ];
    }

    public function messages() : array
    {
        return [
            'place_name.required' => 'Vui lòng nhập tên Địa Danh',
            'star.required' => 'Vui lòng nhập số sao',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.required' => 'Vui lòng chọn ảnh Địa Danh',
            'location.required' => 'Vui lòng nhập địa chỉ Địa Danh',
            'kinhDo.required' => 'Vui lòng nhập kinh độ',
            'viDo.required' => 'Vui lòng nhập vĩ độ',
            'region.required' => 'Vui lòng nhập khu vực',
        ];
    }
}
