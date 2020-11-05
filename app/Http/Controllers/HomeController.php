<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Progress;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subject     = Subject::all();
        $i           = 1;
        $total_score = Progress::join('users', 'users.id', '=', 'progresses.user_id')
            ->select('name', DB::raw('AVG(score) as Score'))
            ->groupBy('name')
            ->havingRaw('AVG(score) > ?', [5])
            ->orderBy('Score', 'desc')
            ->get();
        $data        = $total_score->pluck('name')->toArray();
        return view('home', compact('subject', 'total_score', 'i', 'data'));
    }
}
