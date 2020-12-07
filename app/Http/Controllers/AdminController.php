<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyRequest;
use App\Http\Requests\AddStudentRequest;
use App\User;
use App\Models\Notify;
use Illuminate\Support\Facades\Auth;
use App\Models\Subject;
use App\Http\Requests\CreateSubjectRequest;
use Illuminate\Http\Request;
use App\Models\Progress;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    // show list users
    public function getListUser()
    {
        $user = User::paginate(10);
        return view('admin.user.list_user', compact('user'));
    }

    // create notify
    public function createNotify(NotifyRequest $request)
    {
        $notify = Notify::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'notify' => $request->notify
        ]);
        return redirect('admin/list_user')->with('thongbao', 'Tạo thông báo thành công!');
    }

    public function create()
    {
        return view('admin.subject.create_subject');
    }

    //create subject
    public function store(CreateSubjectRequest $request)
    {
        $subject = Subject::create([
            'name' => $request->name,
            'ma_mh' => $request->ma_mh,
            'description' => $request->description,
            'giang_vien' => 'TS.Dương Lê Minh',
            'email_gv' => 'minhdl@gmail.com',
            'ki_hoc' => 'Học kì I năm 2020 - 2021',
        ]);
        return redirect('admin/list_subject')->with('thongbao', 'Thêm môn học thành công!');
    }

    public function list_subject()
    {
        $subject = Subject::paginate(5);
        return view('admin.subject.list_subject', compact('subject'));
    }

    public function getListStudentClass(Request $request)
    {

        $subject = Subject::all();
        $index   = $request->index;
        $user  = Progress::join('subjects', 'subjects.id', '=', 'progresses.subject_id')
            ->where('ma_mh', $index)
            ->join('users', 'users.id', '=', 'progresses.user_id')
            ->select('users.*', 'progresses.*')
            ->get();
        $k       = 1;
        return view('admin.subject.list_student_in_subject', compact('subject', 'index', 'user', 'k'));
    }

    //delete students
    public function destroy(Request $request, $user_id) {
        $index   = $request->index;
        $user = Progress::join('subjects', 'subjects.id', '=', 'progresses.subject_id')
            ->where('ma_mh', $index)
            ->where('user_id', $user_id)
            ->select('progresses.*')
            ->first();
        $user->delete();
        return redirect()->back()->with('thongbao', 'Xóa sinh viên thành công!');
    }

    //add student in class subject
    public function add_student(AddStudentRequest $request)
    {
        $msv = $request->input('ma_sv');
        $index = $request->index;
        $user = User::where('ma_sv', $msv)->select('id')->first();
        if (empty($user)) {
            return redirect()->back()->with('thongbao', 'Mã sinh viên không tồn tại!');
        }
        $students  = Progress::join('subjects', 'subjects.id', '=', 'progresses.subject_id')
            ->where('ma_mh', $index)
            ->join('users', 'users.id', '=', 'progresses.user_id')
            ->select('users.*', 'progresses.*')
            ->get();    
        foreach ($students as $student) {
            if ($student->ma_sv == $msv) {
                return redirect()->back()->with('thongbao', 'Sinh viên đã đăng kí lớp học rồi!');
            }
        }
        
        $subject = Subject::where('ma_mh', $index)->select('id')->first();
        
        $user_subject = Progress::create([
            'user_id' => $user->id,
            'subject_id' => $subject->id
        ]);
        return redirect()->back()->with('thongbao', 'Thêm sinh viên thành công!');
    }
}