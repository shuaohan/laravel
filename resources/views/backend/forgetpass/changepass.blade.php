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
            <div
                class="offset-2 offset-sm-4 offset-lg-4 offset-xl-4 offset-md-4 col-8 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <form method="post" action="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="original_password">原密码</label>
                        <input type="password" class="form-control" id="original_password" placeholder="OldPassword"
                            name="original_password">
                            @if ($errors->any())
                                    @foreach ($errors->get('original_password') as $error)
                                    <small class="form-text text-danger"> {{ $error }}</small>
                                   
                                    @endforeach
                            @endif
                            
                    </div>
                    <div class="form-group">
                        <label for="password">新密码</label>
                        <input type="password" class="form-control" id="password" placeholder="NewPassword"
                            name="password">
                            @if ($errors->any())
                                    @foreach ($errors->get('password') as $error)
                                    <small class="form-text text-danger"> {{ $error }}</small>
                                   
                                    @endforeach
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="ConfirmPassword"
                            name="password_confirmation">
                            @if ($errors->any())
                                    @foreach ($errors->get('password_confirmation') as $error)
                                    <small class="form-text text-danger"> {{ $error }}</small>
                                   
                                    @endforeach
                            @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">修改密码</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
