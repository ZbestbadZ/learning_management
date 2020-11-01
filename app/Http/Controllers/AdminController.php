<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyRequest;
use App\User;
use App\Models\Notify;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    // show list users
    public function getListUser(){
        $user = User::paginate(10);
        return view('admin.user.list_user',compact('user'));
    }

    // create notify
    public function createNotify(NotifyRequest $request) {
        $notify = Notify::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'notify' => $request->notify
        ]);
        return redirect('admin/list_user')-> with('thongbao','Tạo thông báo thành công');
    }
}