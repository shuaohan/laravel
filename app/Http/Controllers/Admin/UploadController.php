<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    //
    public function upload(Request $request)
    {
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            if (!$picture->isValid()) {
                abort(400, '无效的上传文件');
            }
            // mylocal 驱动  保存路径 public/resource
            // store('保存路径'，'磁盘驱动')
            // storeAs('保存路径','文件名','磁盘驱动')
            $path=$picture->store('images','mylocal');
            $webpath='/resource/'.$path;
            return response()->json(['path'=>$webpath]);

            //abort(500, '文件上传失败');
        } else {
            abort(400, '请选择要上传的文件');
        }
    }
    //上传预览图
    public function upartpre(Request $request)
    {
        $articleclass=$request->get('class');
        if ($request->hasFile('preview')) {
            $picture = $request->file('preview');
            if (!$picture->isValid()) {
                abort(400, '无效的上传文件');
            }
            // mylocal 驱动  保存路径 public/resource
            // store('保存路径'，'磁盘驱动')
            // storeAs('保存路径','文件名','磁盘驱动')
            switch ($articleclass)
            {
                case 'sound':
                    $path=$picture->store('art_pre/sound','mylocal');
                    break;
                case '2':
                    $path=$picture->store('art_pic/class_2','mylocal');
                    break;
                default:
                    return response()->json(['error'=>'请选择文章分类']);
                    break;
            }
            $webpath='/resource/'.$path;
            return response()->json(['path'=>$webpath,'status'=>'200']);

            //abort(500, '文件上传失败');
        } else {
            abort(400, '请选择要上传的文件');
        }
    }
    //上传图片 //post地址: /admin/upartpic
    public function upartpic(Request $request)
    {
        $articleclass=$request->get('class');
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            if (!$picture->isValid()) {
                abort(400, '无效的上传文件');
            }
            // mylocal 驱动  保存路径 public/resource
            // store('保存路径'，'磁盘驱动')
            // storeAs('保存路径','文件名','磁盘驱动')
            switch ($articleclass)
            {
                case 'boring':
                    $path=$picture->store('art_pic/boring','mylocal');

                    break;
                case 'sound':
                    $path=$picture->store('art_pic/sound','mylocal');
                    break;
                default:
                    return response()->json(['error'=>'请选择文章分类']);
                    break;
            }
            $webpath='/resource/'.$path;
            return response()->json(['path'=>$webpath,'status'=>'200']);

            //abort(500, '文件上传失败');
        } else {
            abort(400, '请选择要上传的文件');
        }
    }
    //上传文章文本文件
    public function uparttxt(Request $request)
    {
       
        if ($request->hasFile('txt')) {
            $articleclass=$request->get('class');
            if (!$request->file('txt')->isValid()) {
                abort(400, '无效的上传文件');
            }
            //mytxt驱动存储路径 /storage/app/txt
            switch ($articleclass)
            {
                case 'joke':
                    $path=Storage::disk('mytxt')->putFile('joke',$request->file('txt'));
                    break;
                case 'sound':
                    $path=Storage::disk('mytxt')->putFile('sound',$request->file('txt'));
                    break;
                default:
                    return response()->json(['error'=>'请选择文章分类']);
                    break;
            }
            return response()->json(['path'=>$path,'status'=>'200']);
        } else {
            abort(400, '请选择要上传的文件');
        }
    }

    public function uptest(Request $request)
    {
        // dd($request->get('class'));
        // $file=$request->file('file');
        // $path=$file->store('sound','mytxt');
        // dd($path);
        $path=Storage::disk('mytxt')->putFile('sound',$request->file('file'));
        //dd($path);  // sound/aaa.txt
        return response()->json(['message'=>'ok','status'=>'200','path'=>$path]);
        

    }
}
