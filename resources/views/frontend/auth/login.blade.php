<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>登录窗口</title>
</head>

<body style="background:url('/images/back.jpg') no-repeat fixed center;background-size: 100%">
    <div class="container-fluid" >
        <div class="row" style="padding-top:10% ">
            <div class="col-xl-4 col-12"></div>
            <div class="col-xl-4 col-12">
                    <div class="card bg-white">
                            <div class="card-header text-center">
                                   <h3>你那么孤独，却说一个人真好</h3> 
                            </div>
                            <div class="card-body">
                                  <form method="POST" action="">
                                          {{ csrf_field() }}
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">邮箱</label>
                                              <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                                             
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputPassword">密码</label>
                                              <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password"
                                                  name="password">
                                          </div>
                                          <div class="form-check">
                                              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remberpwd">
                                              <label class="form-check-label" for="exampleCheck1">记住密码</label>
                                              <a href="/frontend/register" style="float:right"><label >没有账号，去注册</label></a> 
                                              @if(session('error'))
                                              <div class="alert alert-primary" role="alert">
                                                  {{session('error')}}
                                              </div>
                                              @endif
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                                          </div>
                                      </form>
                            </div>
                          </div>
            </div>
            <div class="col-xl-4 col-12"></div>
        </div>
            
        

    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
