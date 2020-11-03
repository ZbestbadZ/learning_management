@if (Auth::check())
    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Menu quản lý</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <span style="font-weight: bold; font-size:15px">Nhà của tôi</span><br>
                    <a href="/home" title="Trang chủ hệ thống"><i class="fa fa-home"></i>&nbsp;Trang chủ</a><br>

                    <ul class="list-unstyled components">
                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="expand_caret fa fa-caret-down" style="font-size:18px;"></i>&nbsp;&nbsp;Các khóa học của tôi
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                @foreach ($subject as $sub)
                                    <li title="{{ $sub->name }}">
                                        <a href="#homesub" data-toggle="collapse" aria-expanded="false">
                                            <i class="expand_caret fa fa-caret-down" style="font-size:18px;margin-left:15px;"></i>&nbsp;&nbsp;&nbsp;{{ $sub->ma_mh }}</a>
                                        <ul id="homesub" class="collapse list-unstyled">
                                            <li><a href="/user/list_student" style="margin-left:35px;"><i class="fa fa-list-ol" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Danh sách thành viên</a></li>
                                            <li><a href="#" style="margin-left:35px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Điểm</a></li>
                                            <li><a href="#" style="margin-left:35px;"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Đánh giá của giảng viên</a></li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
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
