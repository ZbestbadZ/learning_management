@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách thông báo:</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    @foreach ($notify as $noti)

                    <div class="card" style="background-color: rgb(230, 211, 205)"><br>
                        <p class="ml-3">

                            <a href="#" title="Thông báo" data-toggle="popover" data-placement="right" data-content="{{$noti->notify}}">
                                <b>{{$noti->name}}</b>
                            </a>
                            <div class="" style="margin-left: 15px;">
                                <p>{{$noti->notify}}</p>
                                <p style="float: left">Người gửi: {{$user->name}}</p>
                                <p style="float: right; margin-right:15px">
                                    {{ \Carbon\Carbon::createFromTimeStamp(strtotime($noti->created_at))
                                    ->diffForHumans() }}
                                </p>
                            </div>
                        </p>
                    </div><br>

                    @endforeach
                    {{ $notify->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
