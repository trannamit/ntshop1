<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'thumb' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'Tên không được trống',
            'description.required'=> 'Mô tả không được trống',
            'price.required'=> 'Giá không được trống',
            'thumb.required'=> 'Bắt buộc có ảnh sản phẩm'
        ];
    }
}
