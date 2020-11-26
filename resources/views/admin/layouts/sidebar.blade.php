@if (Auth::check())
    <div class="row justify-content">
        <div class="col-md-11 col-xs-11">
            <div class="card">
                <div class="card-header">
                    <h3>Action</h3>
                </div>

                <div class="card-body" style="background-color: rgb(238, 224, 220)">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#notifyModal">Tạo thông báo</button>
                    <hr>
                    <a href="/admin/create_subject" class="btn btn-primary">Thêm môn học</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endif
