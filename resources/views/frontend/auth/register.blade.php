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
<div id="a">
        <div class="container">
                <div class="d-flex justify-content-between bg-light m-2">
                    <div class="p-2">首页</div>
                    <div class="p-2">welcome to logup page</div>
                    <div class="p-2">登录</div>
                </div>
                <div class="p-3  bg-light text-dark">

                        <form action="" method="POST">
                            {{csrf_field()}}
                                <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="username">
                                        </div>
                                    </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Sign up</button>
                                </div>
                            </div>
                        </form>
                </div>

            </div>

</div>



    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
