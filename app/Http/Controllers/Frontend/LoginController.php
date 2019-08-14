<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function getlogin()
    {
        return view('frontend.auth.login');
    }
    public function login(Request $request)
    {
        $result=Auth::guard('user')->attempt([
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
        ]);
        if($result)
        {
            return redirect('/');

        }
        else{
            return redirect('/frontend/login')->with('error','用户名或密码错误');
        }
    }
    public function getuserinfo()
    {
        $email=Auth::guard('user')->user()->email;
        $result=DB::table('users')->where('email','=',$email)->get()->toArray()['0'];
        $data=(json_decode(json_encode($result),true));

        return view('frontend.auth.userinfo',$data);
    }
    public function userinfo()
    {

    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
