<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InforController extends Controller
{
    public function index() {
        $title = "Thông tin người dùng";
        return view('User.infor.infor', compact('title'));
    }
}
