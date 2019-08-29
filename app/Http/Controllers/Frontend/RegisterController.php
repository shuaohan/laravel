<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ForgetpassPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    public function __construct()
    {
         $this->middleware('user.auth')->only(['getchangepass']);
    }

    public function getregister()
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {
        $email=$request->input('email');
        $result=DB::table('users')->where('email',$email)->exists();
        if ($result)
        {
            return redirect()->back()->withErrors(
                'The Email Has Exist!'
                );
           
        }
        else{
            // $request->validate([
            //     'passowrd'=>'required'
            // ])
            DB::table('users')->insert([
                'username'=>$request->input('username'),
                'email'=>$email,
                'password'=>bcrypt($request->input('password'))
            ]);
            return redirect('/frontend/login');
        }

    }
    public function getchangepass()
    {
        return view('frontend.auth.changepass');

    }
    public function changepass(ForgetpassPost $request)
    {
        $model=Auth::guard('user')->user();
        $model->password=bcrypt($request['password']);
        $model->save();
        return redirect('/frontend/login');
    }
}
