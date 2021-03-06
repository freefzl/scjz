<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'type'   => 'required',
            'title' => 'required|string|max:200|min:4',
            'keywords'  => 'required|string',
            'description'   => 'required|string',
            'content'   => 'required|string',
            'editor'   => 'required|string',
            'thumb' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '新闻类型必须选择',
            'thumb.required' => '缩率图是必填的',
        ];
    }
}
