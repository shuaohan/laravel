@extends('layouts.frontend.master')
@section('content')
<div class="card">
    <div class="card-header">
        修改密码
    </div>
    <div class="card-body">
        <form method="POST" action="">
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
                <input type="password" class="form-control" id="password" placeholder="NewPassword" name="password">
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
                <button type="submit" class="btn btn-primary btn-block">修改密码</button>

            </div>
        </form>
    </div>

</div>


@endsection
