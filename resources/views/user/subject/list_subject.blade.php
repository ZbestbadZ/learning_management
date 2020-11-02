@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-bars" style="margin-right:15px;"></i>Danh sách môn học</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    @foreach ($subjects as $subj)
                    <a href="#">
                    <div class="card" style="background-color: rgb(230, 211, 205)"><br>
                        <h5><p class="ml-3">
                            <a href="#" class="btn btn-primary">
                                <b>{{$subj->name}}</b>
                            </a>
                        </p></h5>
                    </div><br>
                    </a>
                    @endforeach
                    {{ $subjects->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
