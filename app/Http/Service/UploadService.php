<?php

namespace App\Http\Service;

class UploadService {
    
    // Hàm tạo file
    public function store($request) {
        if ($request->hasFile('file')) {
            try {
                // Lấy tên file
                $name = $request->file('file')->getClientOriginalName();

                $fullPart = 'upload/' . date('Y/m/d');
                $request->file('file')->storeAs(
                    'public/' . $fullPart, $name
                );
                return '/storage/'.$fullPart . '/' .$name;
            } catch (\Exception $err) {
                return false;
            }
        }
    }
}