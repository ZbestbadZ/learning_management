<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Subject;
use App\Models\Progress;

class UserController extends Controller
{
    // list students
    public function index(Request $request)
    {
        $user = User::paginate(10);
        $subject = Subject::all();
        $index = $request->index;
        return view('user.student.list_student', compact('user', 'subject', 'index'));
    }

    public function getSearchStudent(Request $request)
    {
        if ($request->search_student != '') {
            $search_student = $request->search_student;
            $students = User::where('name', 'like', '%' . $request->search_student . '%')
                ->orWhere('ma_sv', $request->search_student)
                ->orWhere('email', $request->search_student)
                ->get();
            $subject = Subject::all();
        }

        return view('user.student.search_student', ['students' => $students, 'search_student' => $search_student, 'subject' => $subject]);

   }
}
