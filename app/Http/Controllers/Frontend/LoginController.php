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
        $data['year']= substr($data['birthday'],0,4);
        $data['month']= substr($data['birthday'],5,2);
        $data['day']= substr($data['birthday'],8);
        //dd($data);

        return view('frontend.auth.userinfo',$data);
    }
    public function userinfo(Request $request)
    {
        $email=Auth::guard('user')->user()->email;
       $data['username']=$request->input('username');
       $data['phone']=$request->input('phone');
       $data['sex']=$request->input('sex');
       $data['age']=$request->input('age');
       $data['birthday']=$request->input('year').'-'.$request->input('month').'-'.$request->input('day');
       $result=DB::table('users')->where('email','=',$email)->update($data);

        return redirect("/");
    }
    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
