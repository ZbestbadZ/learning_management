@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>DashBoard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Learning Management!
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row justify-content-right">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Trang chủ</h3>
                </div>

                <div class="card-body">
                    Các khóa học
                </div>
            </div>
        </div>
    </div> --}}

</div>
@endsection
