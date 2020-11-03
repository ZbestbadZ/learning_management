@if (Auth::check())
    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Menu quản lý</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <span style="font-weight: bold; font-size:15px">Nhà của tôi</span><br>
                    <a href="/home" title="Trang chủ hệ thống"><i class="fa fa-home"></i>Trang chủ</a><br>
                    <div class="dropdown">
                        <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            Các khóa học của tôi
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                            @foreach ($subject as $sub)
                                <a href="#" title="{{ $sub->name }}" class="dropdown-item">
                                    {{ $sub->ma_mh }}<br>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a href="/user/list_student">Danh sách thành viên</a><br>
                    <a href="#">Điểm</a><br>

                </div>
            </div><br>
            <hr><br>
            <div class="card">
                <div class="card-header">
                    <h3>Timeline</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">


                </div>
            </div>
        </div>
    </div>
@endif
