<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Admin\hocPhi;
use Illuminate\Http\Request;

class readHocPhiController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');

        // Query cơ bản
        $query = hocPhi::with('hocKy.namHoc', 'sinhVien')
                        ->where('deleted', false);

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

        // Phân trang (10 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->paginate(5)->withQueryString();

        return view('admins.tuition.index', compact('data', 'search'));
    }
}
