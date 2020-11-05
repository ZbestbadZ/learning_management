<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Notify;
use Carbon\Carbon;
use App\User;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subjects = Subject::paginate(5);
        $subject  = Subject::all();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();
        
        return view('user.subject.list_subject', compact('subject', 'total_score', 'i', 'data', 'subjects', 'data'));
    }

    // search header
    public function getSearch(Request $request)
    {
        $search  = $request->search;
        if (empty($search)) {
            return redirect('user/list_subject')->with('thongbao', "Không tìm thấy kết quả tìm kiếm");
        } else {
            $subject = Subject::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('ma_mh', $request->search)
                ->get();
        }
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.subject.search_subject', compact('subject', 'search', 'total_score', 'i', 'data'));
    }

    public function getListNotify()
    {
        $notify  = Notify::paginate(5);
        $subject = Subject::all();
        $user    = User::with('notify')->first();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.notify.list_notify', compact('notify', 'user', 'subject', 'total_score', 'i', 'data'));
    }

    public function getScore(Request $request)
    {
        $index   = $request->index;
        $id      = Auth::user()->id;
        $index2  = Subject::where('ma_mh', $index)->select('id')->first();
        $index3  = $index2->id;
        $score   = Progress::where('user_id', $id)
            ->where('subject_id', $index3)
            ->select('score')
            ->first();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $subject = Subject::all();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.score.myscore', compact('index', 'subject', 'score', 'total_score', 'i', 'data'));
    }

    public function getRate(Request $request)
    {
        $index   = $request->index;
        $id      = Auth::user()->id;
        $index2  = Subject::where('ma_mh', $index)->select('id')->first();
        $index3  = $index2->id;
        $rate    = Progress::where('user_id', $id)
            ->where('subject_id', $index3)
            ->select('rate')
            ->first();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $subject = Subject::all();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.rate.myrate', compact('index', 'subject', 'rate', 'total_score', 'i', 'data'));
    }

    public function getAllScore(Request $request)
    {
        $id      = Auth::user()->id;
        $scores  = Progress::where('user_id', $id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh', 'score')
            ->get();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();
        $subject = Subject::all();

        return view('user.score.allscore', compact('subject', 'scores', 'total_score', 'i', 'data'));
    }
}