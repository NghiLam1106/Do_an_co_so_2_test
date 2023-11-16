<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $title = "Liên hệ";
        return view('User.Contact.Contact', compact('title'));
    }
}
