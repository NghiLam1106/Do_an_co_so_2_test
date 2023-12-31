<?php

namespace App\Http\Service\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterService {

    // Hàm thêm dữ liệu
    public function insert($request) {
        try {
            if ($request->input('password') === $request->input('confirmPassword')) {
                User::create([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                    'hinhanh' => (string)$request->input('hinhanh'),
                    'password' => ('bcrypt')($request->input('password')),
                    'DEC' => ('USER')
                ]);
                $request->session()->flash('susscess', "Đăng ký thành công");
                return true;
            }
            else {
                $request->session()->flash('error', "Không khớp mật khẩu");
            }           
        } catch (\Exception $err) {
            $request->session()->flash('error', $err->getMessage());
            return false;
        }

        return true;
    } 
}

?>