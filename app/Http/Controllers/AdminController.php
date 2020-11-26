<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyRequest;
use App\User;
use App\Models\Notify;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Http\Requests\CreateSubjectRequest;

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
        return redirect('admin/list_user')-> with('thongbao','Tạo thông báo thành công!');
    }

    public function create() {
        return view('admin.subject.create_subject');
    }

    //create subject
    public function store(CreateSubjectRequest $request) {
        $subject = Subject::create([
            'name' => $request->name,
            'ma_mh' => $request->ma_mh,
            'description' => $request->description,
            'giang_vien' => 'TS.Dương Lê Minh',
            'email_gv' => 'minhdl@gmail.com',
            'ki_hoc' => 'Học kì I năm 2020 - 2021',
        ]);
        return redirect('admin/list_user')-> with('thongbao','Thêm môn học thành công!');
    }
}