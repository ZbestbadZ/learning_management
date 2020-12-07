@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex align-items-center"><span class=""><b>Thêm sinh viên</b></span></h5>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('add_student')}}">
                        <!-- hidden -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label for="name">Tên sinh viên </label>
                            <input class="form-control" type="text" name="name" id="name" value="" autofocus>
                            @error('name')
                                <div class="text-danger" ><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ma_mh">Mã môn học</label>
                            <input class="form-control" type="text" name="ma_mh" id="ma_mh" value="">
                            @error('ma_mh')
                                <div class="text-danger" ><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả</label>
                            <input class="form-control" type="text" name="description" id="description" value="">
                            @error('description')
                                <div class="text-danger" ><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>                       

                        <button class="btn btn-primary" type="submit" name="create">Thêm môn học</button>
                    </form>
                </div>
            </div>
</div>

@endsection
