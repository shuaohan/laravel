<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PicturePost extends FormRequest
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
     * 验证规则
     * @return array
     */
    public function rules()
    {
        // $this->addValidator();
        return [
            'title'=>'sometimes|required',
            'url'=>'sometimes|required',
        ];
    }
    // 自定义返回的错误信息
    public function messages()
    {
        return [
            'title.required'=>'标题不能为空',
            'url.required'=>'地址不能为空',
        ];
    }
}
