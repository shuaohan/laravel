@extends('layouts.frontend.master')
@section('content')
<div class="card ">
        <div class="card-header text-center">
            修改资料
        </div>
        <div class="card-body">
                <form method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" placeholder="邮箱" name="email" readonly
                                    value="{{$email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">用户名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" placeholder="用户名" name="username"
                                    value="{{$username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">手机号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" placeholder="手机号" name="phone"
                                    value="{{$phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="age" class="col-sm-2 col-form-label">年龄</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="age" placeholder="年龄" name="age"
                                        value="{{$age}}">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">性别</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="sex">
                                    <option selected value="{{$sex}}">{{$sex}}</option>
                                    <option value="男">男</option>
                                    <option value="女">女</option>
        
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">生日</label>
                            <div class="col-sm-3">
                                <select class="custom-select" name="year">
                                    <option selected value="{{$year}}">{{$year}}</option>
                                    @for ($i = 1900; $i < 2020; $i++) <option value="{{$i}}">{{$i}}年</option>
        
                                        @endfor
                                    </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="custom-select" name="month">
                                    <option selected value="{{$month}}">{{$month}}</option>
                                    @for ($i = 1; $i < 13; $i++) @if ($i<10) <option value="0{{$i}}">{{$i}}月</option>
                                        @else
                                        <option value="{{$i}}">{{$i}}月</option>
                                        @endif
                                        @endfor
        
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select class="custom-select" name="day">
                                    <option selected value="{{$day}}">{{$day}}</option>
                                    @for ($i = 1; $i < 31; $i++) @if ($i<10) <option value="0{{$i}}">{{$i}}日</option>
                                        @else
                                        <option value="{{$i}}">{{$i}}日</option>
                                        @endif
                                        @endfor
        
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <div style="width:100%"> <a href="/frontend/changepass"  style="float:right;">修改密码</a></div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary btn-block">保存</button>
                        </div>
                    </form>
        </div>
        
    </div>
@endsection

