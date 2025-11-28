<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\bienLai;
use Illuminate\Http\Request;

class readBienLaiController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');

        // Query cơ bản
        $query = BienLai::with('hocPhi.sinhVien', 'hocPhi.hocKy', 'nhanVien')
                        ->where('deleted', false);

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

        // Phân trang (10 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->paginate(5)->withQueryString();

        return view('admins.receipt.index', compact('data', 'search'));
    }
}
