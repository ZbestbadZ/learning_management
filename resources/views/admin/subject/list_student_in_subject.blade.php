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
                    <h3><i class="fa fa-bars" style="margin-right:15px;"></i>Danh sách sinh viên lớp môn học {{ $index }}
                    </h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <table class="table table-hover table-bordered table-striped display">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Mã sinh viên</th>
                                <th>Email</th>
                                <th>Điểm</th>
                                <th>Đánh giá</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $list)
                                <tr>
                                    <td>{{ $k++ }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->ma_sv }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>
                                        @if (!empty($list->score))
                                            {{ $list->score }} <a href="#" style="float:right">sửa</a>
                                        @else
                                            <a href="#">Cho điểm</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($list->rate))
                                            {{ $list->rate }} <a href="#" style="float:right">sửa</a>
                                        @else
                                            <a href="#">Đánh giá</a>
                                        @endif
                                    </td>
                                    <td>
                                    <form method="POST" action="{{ url("admin/{$list->user_id}/?index={$index}") }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return myFunction();"><i class="fa fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>

@endsection
