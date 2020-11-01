@extends('layouts.app')
@section('content')

<div class="main-right" style="margin-top: 25px">

    <div class="form-group" style="width: 70%">
    <form action="{{url("admin/user/notification")}}" method="POST">
       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <label>Tạo thông báo</label>
       <br><textarea type="text" name="notification"
        rows="2" class="form-control" placeholder="..."
        ></textarea>
       <br><input type="submit" class="btn btn-primary" value="Gửi">

   </form>

    </div>

    @if(session('thongbao'))

    <div class="alert alert-success" style="width: 50%">
        {{session('thongbao')}}
    </div>

@endif

@if(count($errors) > 0)
    <div class="alert alert-danger" style="width: 50%">

        @foreach ($errors -> all() as $err)
            {{$err}}<br>
        @endforeach

    </div>
@endif

@endsection
