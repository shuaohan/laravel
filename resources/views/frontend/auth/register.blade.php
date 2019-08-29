@extends('layouts.frontend.master')
@section('content')

<div class="p-3  bg-light text-dark">
    <div class="card">
        <div class="card-header text-center">
            注册
        </div>
        <div class="card-body">
            <form action="" method="POST">
                {{csrf_field()}}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Name" name="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email"
                            required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password"
                            name="password" required>
                    </div>
                </div>
                <div class="form-group">
                 <label style="float:right"><a href="/frontend/login">已有账号，去登陆</a></label>
                </div>
                <div>
                    @if(count($errors)>0)
                    <div class="alert alert-primary" role="alert">
                        {{$errors}}
                    </div>
                    @endif
                </div>

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-block">注册</button>
                </div>

            </form>
        </div>

    </div>


</div>


@endsection
