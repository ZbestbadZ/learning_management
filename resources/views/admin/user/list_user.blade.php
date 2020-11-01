@extends('admin.layouts.app')
@section('content')

<div style="width: 90%">
        <h3>Danh sách sinh viên</h3>

        @if(session('thongbao'))

        <div class="alert alert-success" style="width:50%">
            <a href="#" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
            {{session('thongbao')}}
        </div>
        @endif

    <table class="table table-hover table-bordered table-striped display" >
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mã sinh viên</th>
                <th>Email</th>
                <th>Achievement</th>
            </tr>
        </thead>
        <tbody
        @foreach($user as $list)
            @if ($list->role == 0)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->ma_sv}}</td>
                    <td>{{$list->email}}</td>
                    <td>{{$list->achievement}}</td>
                </tr>
            @endif

        @endforeach
        </tbody>

    </table>

    <div aria-label="Page navigation">
        {{$user->links()}}
    </div>

    {{-- Model notify --}}

    <div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tạo thông báo </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('notify')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                  <label for="name_notify" class="col-form-label">Tên thông báo:</label>
                  <input type="text" class="form-control" id="name_notify" name="name" placeholder="Nhập tên">
                  @error('name')
                  <div class="text-danger" ><strong>{{ $message }}</strong></div>
                  @enderror

                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Nội dung:</label>
                  <textarea class="form-control" id="message-text" name="notify" placeholder="Nhập thông báo..." ></textarea>
                  @error('notify')
                  <div class="text-danger" ><strong>{{ $message }}</strong></div>
                  @enderror

                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Gửi thông báo</button>
            </div>
            </form>
          </div>
        </div>
      </div>

</div>
@endsection
