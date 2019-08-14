@extends('layouts.backend.header')
@section('nav')
    <ul class="nav nav-tabs nav-stacked mx-lg-5 my-2">
        <li class="nav-item">
            <a href="/admin/article/index" class="nav-link ">文章管理首页</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/boring" class="nav-link ">无聊图</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/joke" class="nav-link active">搞笑文章</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/sound" class="nav-link ">音乐文章</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/talk" class="nav-link ">话题讨论</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/multi" class="nav-link ">混杂文章</a>
        </li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <form class="form border border-info rounded " action="/admin/article/boring" method="POST">
                {{csrf_field()}}
                <div class="d-flex flex-column">
                    <div>
                        <h3 class="text-info mt-2">文章管理</h3>
                    </div>
                    <div class="border border-info rounded m-2 p-2">
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" name="title" id="title" class="form-control" required="required"  placeholder="请输入标题">
                        </div>
                        <div class="form-group">
                            <label for="">内容</label>
                            <input type="file"  class="form-control-file" id="content"  required="required">
                            <button type="button" class="btn btn-primary" onclick="upload()">上传文本文件</button>
                            <input type="hidden"  id="content-path" name="content" value="" >
                            
                        </div>
                        <div class="form-group">
                            <label for="">热门</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label pl-2">
                                    <input class="form-check-input" type="radio" name="ishot" value="1" > 是
                                    <input class="form-check-input" type="radio" name="ishot" value="0" checked="checked"  > 否
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">推荐</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label pl-2">
                                    <input class="form-check-input " type="radio" name="iscommend" value="1"  > 是
                                    <input class="form-check-input " type="radio" name="iscommend" value="0"  checked="checked"> 否
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="click">点击数</label>
                            <input type="text" name="click" id="click" class="form-control"  placeholder="请输入点击数" value="0">
                        </div>
                        <div class="form-group">
                            <label for="like">喜欢</label>
                            <input type="text" name="like" id="like" class="form-control"   placeholder="请输入点喜欢数" value="0">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary m-2" >提交</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
       function upload()
        {
            var data=$("#content")[0].files[0];
            let formdata=new FormData();
            formdata.append('content',data);
            axios.post(
                '/admin/uparttxt',formdata,
                {
                    headers:{
                      'content-type':'multipart/form-data'
                    },
                    params:{
                        class:'joke'
                    }
                }

            ).then(function (response) {
                $('#content-path').val(response.data.path);
                
            }).catch(function (error) {
                console.log(error);

            });
        }
    </script>
@endsection
