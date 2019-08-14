<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>注册</title>
</head>

<body>
    <div class="container-fluid">
        <form method="post" action="">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputPassword">原密码</label>
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="original_password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">新密码</label>
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="new_password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">确认密码</label>
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="confirm_password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">修改密码</button>
            </div>
        </form>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
