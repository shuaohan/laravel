<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Resource\Lesson;
use App\Model\Resource\Video;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.lesson.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Lesson $lesson,Video $video)
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
        $lesson['title']=$forms['title'];
        $lesson['introduce']=$forms['introduce'];
        $lesson['preview']=$forms['preview'];
        $lesson['ishot']=$forms['ishot'];
        $lesson['iscommend']=$forms['iscommend'];
        $lesson['click']=$forms['click'];
        $lesson->save();
        //videos数据
        $videos=$data['videos'];
        foreach ($videos as $item) {
            # code...
            $lesson->videos()->create($item);
        }
        return response()->json(['message'=>'成功','state'=>'200','url'=>'/admin/lessons']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
