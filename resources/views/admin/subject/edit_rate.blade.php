@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title d-flex align-items-center"><span class=""><b>Sửa đánh giá</b></span></h5>
                </div>
                <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="">
                        <!-- hidden -->
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                            <label for="rate">Đánh giá </label>
                            <input class="form-control" type="text" name="rate" id="rate" placeholder="Nhập đánh giá" value="{{$user->rate}}">
                            @error('rate')
                                <div class="text-danger" ><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>                     

                        <button class="btn btn-primary" type="submit" name="create">Sửa</button>
                    </form>
                </div>
            </div>
</div>

@endsection
