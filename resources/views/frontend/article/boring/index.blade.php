@extends('layouts.frontend.master')
@section('content')
    <div class="row" >
            @foreach($data as $item)
            <div class="col-sm-4">
                <div class="card mx-2 my-2" >
                    <img class="card-img-top" src="{{$item->picture}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <a href="#" class="btn btn-primary">Go </a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
@endsection

