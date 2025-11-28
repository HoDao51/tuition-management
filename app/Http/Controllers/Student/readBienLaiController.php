<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\BienLai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class readBienLaiController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');

        // Lấy id sinh viên từ user đang đăng nhập
        $idSinhVien = Auth::user()->sinhVien->id;

        // Query cơ bản: chỉ lấy biên lai của sinh viên đang đăng nhập
        $query = BienLai::with('hocPhi.sinhVien', 'hocPhi.hocKy', 'nhanVien')
                        ->where('deleted', false)
                        ->whereHas('hocPhi', function ($q) use ($idSinhVien) {
                            $q->where('id_sinh_vien', $idSinhVien);
                        });

        // Áp dụng tìm kiếm nếu có từ khóa
        if ($search) {
            $query->whereHas('hocPhi.sinhVien', function ($q) use ($search) {
                    $q->where('hoTen', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%')
                      ->orWhere('ma_sv', 'like', '%' . $search . '%');
                })
                ->orWhereHas('hocPhi.hocKy', function ($q) use ($search) {
                    $q->where('tenHocKy', 'like', '%' . $search . '%');
                })
                ->orWhereHas('hocPhi.hocKy.namHoc', function ($q) use ($search) {
                    $q->where('tenNamHoc', 'like', '%' . $search . '%');
                })
                ->orWhereHas('nhanVien', function ($q) use ($search) {
                    $q->where('hoTen', 'like', '%' . $search . '%')
                      ->orWhere('ma_nv', 'like', '%' . $search . '%');
                });
        }

        // Phân trang (5 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->paginate(5)->withQueryString();

        return view('students.receipt.index', compact('data', 'search'));
    }
}
