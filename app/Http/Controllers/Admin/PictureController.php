<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PicturePost;
use App\Model\Resource\Picture;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * /admin/pictures
     */
    public function index()
    {
        //
        $data=Picture::get();
        //dd($model);
        return view('backend.picture.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * /admin/pictures/create
     */
    public function create()
    {
        //
        return view('backend.picture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  App\Http\Requsets\PicturePost
     * /admin/pictures/create(post)
     */
    public function store(PicturePost $request,Picture $model)
    {
        //
        $model->create($request->all());
        //dd($request->all());
        return redirect('/admin/pictures');
    }

    /**
     * Display the specified resource.
     * 查询
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd($id);
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

        $data=Picture::find($id);


        return view('backend.picture.edit',compact('data'));
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

        $data=Picture::find($id);
        $data->title=$request->title;
        $data->url=$request->url;
        $data->save();
        return redirect('/admin/pictures');

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
        Picture::where('id',$id)->delete();
        return response()->json(['message'=>'删除成功', 'valid'=>'1']);
    }
}
