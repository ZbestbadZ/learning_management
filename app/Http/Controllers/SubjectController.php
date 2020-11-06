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
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();
        $scores      = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh')
            ->get();
        $subject     = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh', 'ki_hoc', 'giang_vien', 'email_gv')
            ->paginate(5);

        return view('user.subject.list_subject', compact('total_score', 'i', 'data', 'scores', 'subject'));
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
        $id = Progress::where('user_id', Auth::user()->id)->select('user_id')->first();
        // dd($id);
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();
        $scores  = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh', 'user_id')
            ->get();

        return view('user.subject.search_subject', compact('subject', 'search', 'total_score', 'i', 'data', 'scores', 'id'));
    }

    public function store(Request $request) {
        
        $user_subject = Progress::create([
           'user_id' => Auth::user()->id,
           'subject_id' => 1,
           'score' => '8',
           'rate' => 'abc'
        ]);

        return redirect('user/list_subject')->with('thongbao', "Đăng kí môn học thành công!");
    }

    public function getListNotify()
    {
        $notify  = Notify::orderBy('created_at', 'desc')
            ->paginate(5);
        $scores  = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh')
            ->get();
        $user    = User::with('notify')->first();
        $i       = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.notify.list_notify', compact('notify', 'user', 'scores', 'total_score', 'i', 'data'));
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
        $scores  = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh')
            ->get();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.score.myscore', compact('index', 'scores', 'score', 'total_score', 'i', 'data'));
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
        $scores  = Progress::where('user_id', Auth::user()->id)
            ->join('subjects', 'progresses.subject_id', '=', 'subjects.id')
            ->select('name', 'ma_mh')
            ->get();
        $data        = $total_score->pluck('name')->toArray();

        return view('user.rate.myrate', compact('index', 'rate', 'total_score', 'i', 'data', 'scores'));
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

        return view('user.score.allscore', compact('scores', 'total_score', 'i', 'data'));
    }
}