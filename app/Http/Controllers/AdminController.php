<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isadmin');
    }

    // hiển thị danh sách user
    public function getListUser(){
        $user = User::paginate(10);
        return view('admin.user.list_user',compact('user'));
    }
}