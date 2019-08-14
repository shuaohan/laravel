@extends('layouts.backend.master')
@section('content')

<div class="row">
    <div class="col-lg-2 col-sm-2 col-xl-2 p-2">Flex item 1</div>
    <div class="col p-2">
        <form class="form-inline" action="" method="GET">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="select">查询标签</label>
                <input type="text" name="select" id="select" class="form-control" placeholder="请输入查询id">
                <div class="form-group">
                    <button type="submit" onclick="select()" class="btn btn-primary">查询</button>
                </div>
            </div>
        </form>
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-item">
                <a href="/admin/pictures" class="nav-link ">标签列表</a>
            </li>
            <li class="nav-item">
                <a href="/admin/pictures/create" class="nav-link ">新增标签</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link active ">查询结果</a>
            </li>
        </ul>

    </div>
</div>
<script>
    function select() {
        ;
        $.ajax({
            url: '/admin/pictures/' +$(select).value,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {

            }

        })
    }

</script>

@endsection
