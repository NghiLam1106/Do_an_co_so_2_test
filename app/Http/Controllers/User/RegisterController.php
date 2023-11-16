<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\User\RegisterService;
use App\Http\Requests\User\RegisterRequest;

class RegisterController extends Controller
{
    protected $registerservice;

    public function __construct(RegisterService $registerservice) {
        $this->registerservice = $registerservice;
    }

    public function index() {
        $title = "Đăng kí";
        return view('Admin.Account.register', compact('title'));
    }

    public function insert(RegisterRequest $request) {
        $this->registerservice->insert($request);

        // return view('Admin.Account.login', compact('title'));
        return redirect()->back();
    }
}
