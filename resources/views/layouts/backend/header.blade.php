<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>后端登录</title>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="/admin/index">
                后端管理
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">前端首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/lessons">课程管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/video">视频管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/pictures">图片管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/hot">热点管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/article/index">文章管理</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Auth::guard('admin')->user()->username}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/admin/changepass">
                                我的账户
                            </a>
                            <a class="dropdown-item" href="/admin/logout">退出</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('nav')
        @yield('content')
    </div>
    @extends('layouts.backend.footer')

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
