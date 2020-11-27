@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex align-items-center"><span class=""><b>Thêm môn học</b></span></h5>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('create_subject')}}">
                        <!-- hidden -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label for="name">Tên môn học </label>
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

                        {{-- <div class="form-group">
                            <label for="giang_vien">Tên giảng viên</label>
                            <input class="form-control" type="text" name="giang_vien" id="giang_vien" value="" autofocus>
                            <div class="text-danger"><strong><span id="error_giang_vien"></span></strong></div>
                        </div>
                        <div class="form-group">
                            <label for="email_gv">Email GV</label>
                            <input class="form-control" type="text" name="email_gv" id="email_gv" value="">
                            <div class="text-danger"><strong><span id="error_email_gv"></span></strong></div>
                        </div>

                        <div class="form-group">
                            <label for="ki_hoc">Học kỳ</label>
                            <input class="form-control" type="text" name="ki_hoc" id="emki_hocail" value="">
                            <div class="text-danger"><strong><span id="error_ki_hoc"></span></strong></div>
                        </div> --}}

                        <button class="btn btn-primary" type="submit" name="create">Thêm môn học</button>
                    </form>
                </div>
            </div>
</div>

@endsection
