@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex align-items-center"><span class=""><b>Thêm điểm</b></span></h5>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="">
                        <!-- hidden -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label for="score">Điểm </label>
                            <input class="form-control" type="text" name="score" id="score" placeholder="Nhập điểm">
                            @error('score')
                                <div class="text-danger" ><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>                     

                        <button class="btn btn-primary" type="submit" name="create">Thêm điểm</button>
                    </form>
                </div>
            </div>
</div>

@endsection
