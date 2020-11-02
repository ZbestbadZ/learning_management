@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Tìm kiếm thành viên: {{$search_student}}</h3>
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
                        @foreach($students as $student)
                            @if ($student->role == 0)
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->ma_sv}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>Học viên</td>
                                </tr>
                            @endif

                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
