@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Danh sách thành viên: lớp môn học ...</h3>
                    <div class="search-container">
                        <form method="GET" action="{{ route('search_student') }}">
                            <input type="text" placeholder="Tìm kiếm thành viên..." name="search_student">
                            {{ csrf_field() }}
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <table class="table table-hover table-bordered table-striped display" >
                        <thead class="thead-dark">
                            <tr>
                                <th>Họ và tên</th>
                                <th>Mã sinh viên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                            </tr>
                        </thead>
                        <tbody
                        @foreach($user as $list)
                            @if ($list->role == 0)
                                <tr>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->ma_sv}}</td>
                                    <td>{{$list->email}}</td>
                                    <td>Học viên</td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>

                    </table>

                    <div aria-label="Page navigation">
                        {{$user->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
