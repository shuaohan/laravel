@extends('layouts.backend.header')
@section('nav')
    <ul class="nav nav-tabs nav-stacked mx-lg-5 my-2">
        <li class="nav-item">
            <a href="/admin/article/index" class="nav-link active">文章管理首页</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/boring" class="nav-link ">无聊图</a>
        </li>
        <li class="nav-item">
            <a href="/admin/article/joke" class="nav-link ">搞笑文章</a>
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
    <p>这是文章管理的首页</p>
{{--    <div class="container" id="app">--}}

{{--    </div>--}}
{{--    <script src="/js/article.js"></script>--}}
@endsection
