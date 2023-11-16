<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\User\ChangeinforService;

class ChangeinforController extends Controller
{
    protected $ChangeinforService;

    public function __construct(ChangeinforService $ChangeinforService) {
        $this->ChangeinforService = $ChangeinforService;
    }

    public function index(Request $request, $id) {
        $title = "Thay đổi thông tin";
        if (!empty($id)) {
            $infor = $this->ChangeinforService->listUserByid($id);
            if (!empty($infor[0])) {
                $request->session()->put('id', $id);
                $infor = $infor[0];
            }
            // dd($infor);
        }
        else {
            session()->flash('error', 'Danh mục không tồn tại');
            return redirect()->route('infor');
        }
        return view('User.infor.changeinfor', compact('title', 'infor'));
    }

    public function update(Request $request) {
        $id = session('id');
        $this->ChangeinforService->update($request, $id);
        return redirect()->back();
    }
}
