<?php

namespace App\Http\Service\User;

use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChangeinforService {

    // 
    public function listUserByid($id) {
        return DB::select('select * from users where id = ?', [$id]);
    }

    // Hàm cập nhật dữ liệu
    public function update($request, $id) {
        try {
            if (empty($request->input('password')) && empty($request->input('passwordcomfirm'))) {
                DB::table('users')->where('id', '=', $id)->update([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                ]);
                $request->session()->flash('success', "Cập nhật thành công");
                return true;
            }
            else if ($request->input('password') === $request->input('confirmPassword')) {
                DB::table('users')->where('id', '=', $id)->update([
                    'name' => (string)$request->input('name'),
                    'email' => (string)$request->input('email'),
                    'password' => ('bcrypt')($request->input('password'))
                ]);
                $request->session()->flash('susscess', "Cập nhật thành công");
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