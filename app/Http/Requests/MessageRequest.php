<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'phone'   => 'required|numeric|regex:/^1[3456789][0-9]{9}$/',
                        'code'   => 'required|captcha',
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                };
        }
    }

    public function messages()
    {
        return [
            'phone.required' => '手机号不能为空。',
            'phone.numeric' => '手机号不符合要求。',
            'phone.regex' => '手机号不符合要求。',
            'code.required' => '验证码不能为空。',
            'code.captcha' => '验证码错误。',
        ];
    }

}
