@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                @if (session('thongbao'))

                    <div class="alert alert-success" style="width:50%">
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></a>
                        {{ session('thongbao') }}
                    </div>

                @endif
                <div class="card-header">
                    <h3><i class="fa fa-bars" style="margin-right:15px;"></i>Thông tin môn học</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">

                        <a href="#">
                            <div class="card" style="background-color: rgb(230, 211, 205)"><br>
                                <h5>
                                    <p class="ml-3">
                                        <a href="#">
                                            <b>{{ $subject->name }} ({{ $subject->ma_mh }})</b>
                                        </a>
                                    </p>
                                </h5>
                                <div class="" style="margin-left: 15px;">
                                    <p style="float: left">Giảng viên: <span
                                            title="{{ $subject->email_gv }}">{{ $subject->giang_vien }} - <i>Email: {{ $subject->email_gv }}</i></span></p>
                                    <p style="float: right; margin-right:15px">{{ $subject->ki_hoc }}</p>
                                </div>
                                @if (empty($user_id))
                                    <form action="{{ url("/user/register_subject/{$subject->id}") }}" method="POST">

                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <button type="submit" style="float: left" class="btn btn-primary">Đăng kí môn
                                            học</button>
                                    </form>
                                @else
                                    <a href="#" style="float: left" class="btn btn-primary">Đã đăng kí môn học</a>
                                @endif
                            </div><br>
                        </a>


                </div>
            </div>
        </div>
    </div>

@endsection
