@extends('layouts.backend.master')
@section('content')

<div class="row">
    <div class="col-lg-2 col-sm-2 col-xl-2 p-2">Flex item 1</div>
    <div class="col p-2">     
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-item">
                <a href="/admin/lessons" class="nav-link active">课程列表</a>
            </li>
            <li class="nav-item">
                <a href="/admin/lessons/create" class="nav-link">新增课程</a>
            </li>
           
        </ul>

        <table class="table ">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>url</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td scope="row">{{$item->title}}</td>
                    <td>{{$item->url}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="">
                                <a href="/admin/pictures/{{$item->id}}/edit"><button type="button" class="btn btn-default">编辑 </button></a>
                            <button type="button" onclick="del('{{$item->id}}')" class="btn btn-default">删除</button>
                        </div>
                   
                    </td>

                </tr>
                @endforeach --}}
            </tbody>
        </table>



    </div>
</div>

<script> 
function del(id)
{

    $.ajax({
        url:'/admin/pictures/'+id,
        method:'DELETE', 
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function(respone)
        {
            window.alert(respone.message);
            window.location.reload();

        }
    })

}

</script>

@endsection
