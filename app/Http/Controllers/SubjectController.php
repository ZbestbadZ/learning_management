<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('user.subject.list_subject', ['subjects' => $subjects]);
    }

    // search header
    public function getSearch(Request $request)
    {
        if ($request->search != '') {
            $search = $request->search;
            $subject = Subject::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('ma_mh', $request->search)
                ->get();
        }

        return view('user.subject.search_subject', ['subject' => $subject, 'search' => $search]);
    }
}