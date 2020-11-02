@extends('layouts.app')

@section('content')

    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Trang chủ hệ thống</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                          <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ URL::asset('/images/learning.jpg') }}" alt="Los Angeles" width="668" height="428">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ URL::asset('/images/learning1.jpg') }}" alt="Chicago" width="668" height="428">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ URL::asset('/images/learning3.png') }}" alt="New York" width="668" height="428">
                          </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                        </a>
                      </div>

                </div>
            </div>
        </div>
    </div>

@endsection
