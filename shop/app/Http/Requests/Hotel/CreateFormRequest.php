<?php

namespace App\Http\Requests\Hotel;

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
            'hotel_name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'location' => 'required|max:255',
            'kinhDo' => 'required',
            'viDo' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'hotel_name.required' => 'Vui lòng nhập tên khách sạn',
            'image.required' => 'Vui lòng chọn ảnh khách sạn',
            'location.required' => 'Vui lòng nhập địa chỉ khách sạn',
            'kinhDo.required' => 'Vui lòng nhập kinh độ',
            'viDo.required' => 'Vui lòng nhập vĩ độ',
        ];
    }
}
