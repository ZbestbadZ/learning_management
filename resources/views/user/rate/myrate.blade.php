@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                <h3>Đánh giá của giảng viên - Lớp môn học {{$index}}</h3>

                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">

                        <table class="table table-hover table-bordered table-active display" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{$rate->rate}}</td>
                                </tr>
                            </tbody>

                        </table>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
