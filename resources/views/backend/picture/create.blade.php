@extends('layouts.backend.master')
@section('content')

<div class="row">
    <div class="col-lg-2 col-sm-2 col-xl-2 p-2">Flex item 1</div>
    <div class="col p-2">
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-item">
                <a href="/admin/pictures" class="nav-link">标签列表</a>
            </li>
            <li class="nav-item">
                <a href="/admin/pictures/create" class="nav-link active">新增标签</a>
            </li>
  
        </ul>
        <form class="form" action="/admin/pictures" method="POST">
           {{ csrf_field() }}
            <div class="form-group">
                <label for="title">标题</label>
                <input type="text" name="title" id="title" class="form-control" required="required" placeholder="请输入标题">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
                <label for="url">路径</label>
                <input type="text" name="url" id="url" class="form-control" required="required" placeholder="请输入标题">
                <small id="helpId" class="text-muted">Help text</small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        </form>
    </div>
</div>

@endsection
