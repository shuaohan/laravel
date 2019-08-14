<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>信息</title>
</head>

<body>
<div id="a">
    <div class="container">
        <form method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">用户名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" placeholder="username" name="username" value="{{$username}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">手机号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{$phone}}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">性别</label>
                <div class="col-sm-10">
                    <select class="custom-select">
                        <option selected value="无">{{$sex}}</option>
                        <option value="男">男</option>
                        <option value="女">女</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">生日</label>
                <div class="col-sm-3">
                    <select class="custom-select">
                        <option selected value="无">choose</option>
                        <option value="1">男</option>
                        <option value="2">女</option>

                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select">
                        <option selected value="无">choose</option>
                        <option value="1">男</option>
                        <option value="2">女</option>

                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select">
                        <option selected value="无">choose</option>
                        <option value="1">男</option>
                        <option value="2">女</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
