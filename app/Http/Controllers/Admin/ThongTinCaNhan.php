<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateThongTinCaNhan;
use Illuminate\Support\Facades\Auth;

class ThongTinCaNhan extends Controller
{
    public function index(){
        return view('admins.information.index');
    }

    public function edit()
    {
        $nhanVien = Auth::user()->nhanVien;
        return view('admins.information.edit', compact('nhanVien'));
    }

public function update(UpdateThongTinCaNhan $request)
{
    $nhanVien = Auth::user()->nhanVien;

    $nhanVien->user->update([
        'name' => $request->hoTen,
        'email' => $request->email,
        'role' => $request->chucVu,
    ]);

        $hoTen = $request->hoTen;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $chucVu = $request->chucVu;
        $email = $request->email;
        $soDienThoai = $request->soDienThoai;

        // Xử lý ảnh đại diện
        $path = $nhanVien->anhDaiDien; // giữ ảnh cũ nếu không upload mới
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien');
            $fileName = time() . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('nhanVien', $fileName, 'public');
        }

        $nhanVien->update([
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'chucVu' => $chucVu,
            'email' => $email,
            'soDienThoai' => $soDienThoai,
            'anhDaiDien' => $path
        ]);

        return redirect()->route('thongTinCaNhan.index');
    } 
}
