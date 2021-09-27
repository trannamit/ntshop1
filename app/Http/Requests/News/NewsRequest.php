<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required',
            'thumb' => 'required',
            'content' => 'required'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Tiêu đề không được trống',
            'thumb' => 'Bắt buộc có ảnh',
            'content' => 'Nội dung không được trống'
        ];
    }

}
