<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Subject;
use App\Models\Progress;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subject::paginate(5);

        return view('user.list_subject', ['subjects'=> $subjects]);
    }
}