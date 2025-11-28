<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\hocPhi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // thêm dòng này

class readHocPhiController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $search = $request->get('search');

        // Lấy id sinh viên từ user đang đăng nhập
        $idSinhVien = Auth::user()->sinhVien->id;
        
        // Query cơ bản: chỉ lấy học phí của sinh viên đang đăng nhập
        $query = hocPhi::with('hocKy.namHoc', 'sinhVien')
                        ->where('deleted', false)
                        ->where('id_sinh_vien', $idSinhVien);

        // Áp dụng tìm kiếm nếu có từ khóa
        if ($search) {
            $query->whereHas('sinhVien', function ($q) use ($search) {
                    $q->where('hoTen', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%')
                      ->orWhere('ma_sv', 'like', '%' . $search . '%');
                })
                ->orWhereHas('hocKy.namHoc', function ($q) use ($search) {
                    $q->where('tenNamHoc', 'like', '%' . $search . '%');
                })
                ->orWhereHas('hocKy', function ($q) use ($search) {
                    $q->where('tenHocKy', 'like', '%' . $search . '%');
                });
        }

        // Phân trang (5 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->paginate(5)->withQueryString();

        return view('students.tuition.index', compact('data', 'search'));
    }
}
