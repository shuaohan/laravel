<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                       登录
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 offset-sm-4 offset-lg-4 offset-xl-4 offset-md-4 col-8 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">邮箱地址</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">密码</label>
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remberpwd">
                        <label class="form-check-label" for="exampleCheck1">记住密码</label>
                        @if(session('error'))
                        <div class="alert alert-primary" role="alert">
                            {{session('error')}}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">登录</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
