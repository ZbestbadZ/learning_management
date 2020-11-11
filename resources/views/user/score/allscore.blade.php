@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                <h3>Điểm tất cả các môn học của bạn</h3>
                <i style="float: right; font-size: 15px; margin-right:5px;">Học kì I năm học 2020 - 2021</i>
                </div>
                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <table class="table table-hover table-bordered table-active display" >
                        <thead class="thead-dark">
                            <tr>
                                <th>Môn học</th>
                                <th>Điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scores as $score)

                                <tr>
                                    <td title="{{$score->name}}">{{$score->ma_mh}}</td>
                                    <td>{{$score->score}}</td>
                                </tr>

                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
