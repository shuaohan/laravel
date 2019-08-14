<?php

namespace App\Http\Controllers\Ordinary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetpassPost;
use Auth;
class AuthController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('ordin.auth')->except(['getlogin','login','index','logout','getregister','register']);
    }
    // 登录视图
    public function getlogin()
    {
        return view('frontend.loginregister.login');
    }
    // 登录处理
    //依赖注入式，引入参数
    // 或者 外观模式
    // use Request
    // $request->input( 'username')
    public function login(Request $request)
    {
       $status=Auth::guard('ordin')->attempt([
        'email' => $request->input('email'),
        'password' => $request->input('password'),

            ]);
           if ($status) {
               return redirect('/');
           }
           else {
                return redirect('/login')->with('error','用户名或密码错误');
           }
    }
    public function index()
    {
       // dd(Auth::guard('ordin')->user()->username);
        return view('frontend.index.index');
    }
    public function getregister()
    {
        return view('frontend.loginregister.register');
    }
    public function register()
    {
        return view('frontend.loginregister.register');
    }
    public function getchangepass()
    {
        return view('frontend.forgetpass.changepass');

    }
    public function changepass(ForgetpassPost $request)
    {
        $model=Auth::guard('ordin')->user();
        //dd($model);
        $model->password=bcrypt($request['password']);
        $model->save();
        return redirect()->back();
    }
    public function logout()
    {
        Auth::guard('ordin')->logout();
        return redirect('/');
    }
}
