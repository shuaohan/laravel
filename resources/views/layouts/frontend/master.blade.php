<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>都是俗人</title>
</head>

<body>
    {{-- 大多数浏览器的默认字号是16px --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index">后端首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">图片</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">视频</a>
                    </li>
                    <li class="nav-item">
                        <a href="/frontend/boring" class="nav-link ">无聊图</a>
                    </li>
                    <li class="nav-item">
                        <a href="/frontend/joke" class="nav-link ">搞笑文章</a>
                    </li>
                    <li class="nav-item">
                        <a href="/frontend/sound" class="nav-link ">音乐文章</a>
                    </li>
                    <li class="nav-item">
                        <a href="/frontend/talk" class="nav-link ">话题讨论</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            混杂文章
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/frontend/">音乐</a>
                            <a class="dropdown-item" href="#">故事</a>
                            <a class="dropdown-item" href="#">土味</a>
                        </div>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    <form class="form-inline ">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (isset(Auth::guard('user')->user()->username))
                            {{Auth::guard('user')->user()->username}}
                            @else
                            未登录
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @if (isset(Auth::guard('user')->user()->username))
                            <a class="dropdown-item" href="/frontend/userinfo">
                                我的资料</a>
                            @else
                            <a class="dropdown-item" href="/frontend/login">
                                我的账户</a>
                            @endif
                            <a class="dropdown-item" href="/frontend/register">注册</a>
                            <a class="dropdown-item" href="/frontend/logout">退出</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
