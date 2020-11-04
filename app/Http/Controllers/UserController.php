<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Subject;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // list students in class
    public function index(Request $request)
    {
        $index   = $request->index;
        $id      = Auth::user()->id;
        $index2  = Subject::where('ma_mh', $index)->select('id')->first();
        // $index3  = $index2->id;
        $user = User::paginate(10);
        $subject = Subject::all();
        return view('user.student.list_student', compact('user', 'subject', 'index'));
    }

    //search students in class
    public function getSearchStudent(Request $request)
    {
        $search_student = $request->search_student;
        if (empty($search_student)) {
            return redirect('user/list_student')->with('thongbao', "Không tìm thấy kết quả tìm kiếm");
        } else {
            $students = User::where('name', 'like', '%' . $request->search_student . '%')
                ->orWhere('ma_sv', $request->search_student)
                ->orWhere('email', $request->search_student)
                ->get();
            $subject = Subject::all();
        }
        return view('user.student.search_student', ['students' => $students, 'search_student' => $search_student, 'subject' => $subject]);

   }
}
