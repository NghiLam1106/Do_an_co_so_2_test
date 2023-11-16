<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminHomeController extends Controller
{
    public function index() {
        $title = "Admin";
        // $name = DB::select('select name from users where id = ?',[1]);
        return view('Admin.home', compact('title'));
    }
}
