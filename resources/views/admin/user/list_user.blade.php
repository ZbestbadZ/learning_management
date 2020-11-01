@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
        {{-- thông báo lỗi --}}
        <h3>Danh sách sinh viên</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:50%">

                @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                @endforeach

        </div>
        @endif

        {{-- hiện thị sửa thành công --}}
        @if(session('thongbao'))

        <div class="alert alert-success" style="width:50%">
            {{session('thongbao')}}
        </div>
        @endif

    <table class="table table-hover table-bordered table-striped display" >
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mã sinh viên</th>
                <th>Email</th>
                <th>Achievement</th>
            </tr>
        </thead>
        <tbody
        @foreach($user as $list)
            @if ($list->role == 0)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->ma_sv}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->achievement}}</td>
                </tr>
            @endif

        @endforeach
        </tbody>

    </table>

    <div aria-label="Page navigation">
        {{$user->links()}}
    </div>
</div>
@endsection
