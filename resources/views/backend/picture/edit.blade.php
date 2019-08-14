@extends('layouts.backend.master')
@section('content')

<div class="row">
    <div class="col-lg-2 col-sm-2 col-xl-2 p-2">Flex item 1</div>
    <div class="col p-2">
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-item">
                <a href="/admin/pictures" class="nav-link ">标签列表</a>
            </li>
            <li class="nav-item">
                <a href="/admin/pictures/create" class="nav-link ">新增标签</a>
            </li>
            <li class="nav-item">
                    <a href="/admin/pictures/create" class="nav-link active">编辑标签</a>
                </li>
           
        </ul>
    <form class="form-inline m-2" action="/admin/pictures/{{$data->id}}" method="POST">
           {{ csrf_field() }}
          {{ method_field('PUT') }}
            <div class="form-group m-2">
                <label for="title">标题:</label>
            <input type="text" name="title" id="title" class="form-control" required="required" placeholder="请输入标题" value="{{$data->title}}">
                
            </div>
            <div class="form-group m-2">
                    <label for="url">地址:</label>
                <input type="text" name="url" id="url" class="form-control" required="required" placeholder="请输入标题" value="{{$data->url}}">
                    
                </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </form>
    </div>
</div>

@endsection
