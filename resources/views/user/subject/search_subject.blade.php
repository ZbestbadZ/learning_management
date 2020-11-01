@extends('layouts.app')

@section('content')
    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                <h3>Tìm kiếm môn học: {{$search}}</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    @foreach ($subject as $sub)
                    <a href="#">
                    <div class="card" style="background-color: rgb(230, 211, 205)"><br>
                        <h5><p class="ml-3">
                            <a href="#" class="btn btn-primary">
                                <b>{{$sub->name}}</b>
                            </a>
                        </p></h5>
                    </div><br>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
