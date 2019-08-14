<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\Resource\Point;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    //.\
    public function test()
    {
        //$filepath=
        $file=Storage::files('txt/sound');
        foreach ($file as $key=>$value) {
            $data[$key]=Storage::get($value);
        }
        return view('a',compact('data'));
    }
    public function posttest(Point $point,Request $request)
    {
        //方法一：保存文本文章
        // $str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        // do{
        //     $rands="";
        //     for ($i=0; $i < 4; $i++) {
        //         $rands=$rands.substr(str_shuffle($str),0,9);
        //     }
        //     $filename=$rands.".txt";
        //     $filepath="resource/art_txt/sort/".$filename;
        // } while(file_exists($filepath));
        // $data=$request->input('content');
        // $file=fopen($filepath,"w",true);
        // fwrite($file,$data);
        // fclose($file);
        // echo readfile($filepath);

        //方法二：保存文件文章
//        $file=$request->file('file');
//
//        $path=$file->store('art_txt/sort','mylocal');
//        $filepath='resource/'.$path;
//        echo $filepath;
//        $point['user_id']=$request->input('user_id');
//        $point['article_id']=$request->input('article_id');
//        $point['article_class']=$request->input('article_class');
        //
        // $a=Auth::guard('user')->user()->id;
        // $point['user_id']='2';
        // $point['article_id']='2';
        // $point['article_class']='2';
        // $point['date']=date('Y-m-d');
        // $point->save();
        // echo 'ok';
        $file=$request->file('file');
        dd($file);

    }
}
