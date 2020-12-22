@extends('admin.layouts.app')

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
                    <h3><i class="fa fa-bars" style="margin-right:15px;"></i>Điểm thi lớp môn học INT3307_1</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <table class="table table-hover table-bordered table-striped display">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sinh viên</th>
                                <th>Điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>User {{$i}}</td>
                                    <td>{{rand(7,9)}}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
