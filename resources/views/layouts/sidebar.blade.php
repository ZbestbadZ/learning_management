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
                                <i class="expand_caret fa fa-caret-down" style="font-size:18px;"></i>&nbsp;&nbsp;Các
                                khóa học của tôi
                            </a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                @foreach ($subject as $sub)
                                    <li title="{{ $sub->name }}">
                                        <a href="#homesub" data-toggle="collapse" aria-expanded="false">
                                            <i class="expand_caret fa fa-caret-down"
                                                style="font-size:18px;margin-left:15px;"></i>&nbsp;&nbsp;&nbsp;{{ $sub->ma_mh }}
                                        </a>
                                        <ul id="homesub" class="collapse list-unstyled">
                                            <li><a href="/user/list_student/?index={{ $sub->ma_mh }}"
                                                    style="margin-left:35px;"><i class="fa fa-list-ol"
                                                        aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Danh sách thành
                                                    viên</a></li>
                                            <li><a href="/user/score/?index={{ $sub->ma_mh }}"
                                                    style="margin-left:35px;"><i class="fa fa-graduation-cap"
                                                        aria-hidden="true"></i>&nbsp;&nbsp;Điểm</a></li>
                                            <li><a href="/user/rate/?index={{ $sub->ma_mh }}"
                                                    style="margin-left:35px;"><i class="fa fa-commenting"
                                                        aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Đánh giá của giảng
                                                    viên</a></li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <a href="/user/all_score">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Điểm tất cả các môn
                    </a>
                </div>
            </div><br>
            <hr><br>
            <div class="card">
                <div class="card-header">
                    <h3>Xếp hạng điểm</h3><hr>
                    <h5>Hạng của tôi:
                        @foreach ($data as $key => $value)
                            @if ($value == Auth::user()->name)
                                {{$key + 1}}
                            @endif
                        @endforeach
                    </h5>
                </div>
                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <table class="table table-hover table-bordered table-striped display" >
                        <thead class="thead-dark">
                            <th>STT</th>
                            <th>Tên Sinh viên</th>
                            <th>Điểm TB</th>
                        </thead>
                        <tbody>
                            @foreach ($total_score as $total)
                            <tr @if($total->name == Auth::user()->name) class="huyhoang" @endif>
                                <td>{{$i++}}</td>
                                <td>{{$total->name}}</td>
                                <td>{{number_format($total->Score, 2)}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endif
