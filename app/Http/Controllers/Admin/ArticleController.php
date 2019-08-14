<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Resource\Boring;
use App\Model\Resource\Sound;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    //文章管理首页
    public function getindex()
    {
        return view('backend.article.index');

    }
    public function getboring()
    {
        return view('backend.article.boring.index');

    }
    public function boring(Boring $boring,Request $request)
    {
        $boring['title']=$request['title'];
        $boring['like']=$request['like'];
        $boring['ishot']=$request['ishot'];
        $boring['iscommend']=$request['iscommend'];
        $boring['click']=$request['click'];
        $boring['picture']=$request['picture'];
        $boring->save();
        return redirect('/admin/article/index');
    }
    //搞笑文章
    public function getjoke()
    {
        return view('backend.article.joke.index');

    }
    public function joke(Boring $joke,Request $request)
    {
        $joke['title']=$request['title'];
        $joke['like']=$request['like'];
        $joke['ishot']=$request['ishot'];
        $joke['iscommend']=$request['iscommend'];
        $joke['click']=$request['click'];
        $joke['content']=$request['content'];
        $joke->save();
        return redirect('/admin/article/index');
    }
      //音乐文章
      public function getsound()
      {
          return view('backend.article.sound.index');
  
      }
      public function sound(Sound $sound,Request $request)
      {
          $data=json_decode($request->getContent(),true);
          foreach ($data as $key => $value) {
              if($value=='')
              {
                  return response()->json(['status'=>'500','error'=>$key.'不能为空']);
              }  
          }
          $sound['picture']=$data['picture'];
          $sound['like']=$data['like'];
          $sound['ishot']=$data['ishot'];
          $sound['iscommend']=$data['iscommend'];
          $sound['click']=$data['click'];
          $sound['content']=$data['content'];
          $sound->save();
          return response()->json(['status'=>'200']);
      }
    //杂乱文章
    public function article(Request $request)
    {
        //获取json数据并转成数组数据
        $data=json_decode($request->getContent(),true);
        //forms数据

        $forms=$data['forms'];
        foreach ($forms as $item => $value) {
            # code...
            if($value=="")
            {
                return response()->json(['message'=>$item.' not null','state'=>'400']);

            }
        }
        $class=$request->get('class');
        switch ($class)
        {
            case '1':
                $lesson['title']=$forms['title'];
                $lesson['introduce']=$forms['introduce'];
                $lesson['preview']=$forms['preview'];
                $lesson['ishot']=$forms['ishot'];
                $lesson['iscommend']=$forms['iscommend'];
                $lesson['click']=$forms['click'];
                break;
            default:
                break;
        }
        //图片数据
        $pictures=$data['pictures'];


        return response()->json(['message'=>'ok']);

    }
}
