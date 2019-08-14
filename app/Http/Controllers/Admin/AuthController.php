<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminForgetpassPost;

class AuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['getlogin','login']);
    }
    public function getlogin()
    {
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        $status=Auth::guard('admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
                ]);
        if($status)
        {
            return redirect('/admin/index');
        }
        else{
            return redirect('/admin/login')->with('error','用户名或密码错误');;
        }
    }
    public function index()
    {
        
         return view('backend.admin.index');
    }
    // 
    public function getchangepass()
    {
        return view('backend.forgetpass.changepass');

    }
    public function changepass(AdminForgetpassPost $request)
    {
        $model=Auth::guard('admin')->user();
        //dd($model);
        $model->password=bcrypt($request['password']);
        $model->save();
        return redirect('admin/login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
