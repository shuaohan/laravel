<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use Hash;
use Auth;
class ForgetpassPost extends FormRequest
{
    /**
     *  php artisan make:request AdminForgetpassPost
     * Determine if the user is authorized to make this request.
     *确定用户是否有权提出此请求。
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    // 添加验证规则
    public function addValidator(){
        Validator::extend('check_pass',function($attribute,$value,$parameters,$validator){
            return Hash::check($value, Auth::guard('user')->user()->password);
        });

    }
    /**
     * Get the validation rules that apply to the request.
     * 验证规则
     * @return array
     */
    public function rules()
    {
        $this->addValidator();
        return [
            'password'=>'sometimes|required|confirmed',
            'original_password'=>'sometimes|required|check_pass',
            'password_confirmation'=>'sometimes|required',
        ];
    }
    // 自定义返回的错误信息
    public function messages()
    {
        return [
            'original_password.required'=>'原密码不能为空',
            'password.required'=>'新密码不能为空',
            'password.confirmed'=>'两次密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
            'original_password.check_pass'=>'原密码错误',
        ];
    }
}
