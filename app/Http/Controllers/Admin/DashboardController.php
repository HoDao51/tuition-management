<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SinhVien;
use App\Models\Admin\NhanVien;
use App\Models\Admin\HocPhi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tongNhanVien = NhanVien::count();
        $tongSinhVien = SinhVien::count();

        // Sinh viên đã đóng đủ
        $sinhVienDaDong = SinhVien::whereHas('hocPhi')
            ->whereDoesntHave('hocPhi', function($q) {
                $q->whereColumn('soTienDaThanhToan', '<', 'tongTien');
            })->count();

        $chuaDong = $tongSinhVien - $sinhVienDaDong;

        // Lấy danh sách sinh viên chưa đóng hoặc đóng thiếu
        $dsChuaDong = SinhVien::whereDoesntHave('hocPhi')
            ->orWhereHas('hocPhi', function($q) {
                $q->whereColumn('soTienDaThanhToan', '<', 'tongTien');
            })
            ->paginate(5)
            ->withQueryString();

        return view('admins.dashboard.index', compact(
            'tongNhanVien',
            'tongSinhVien',
            'sinhVienDaDong',
            'chuaDong',
            'dsChuaDong'
        ));
    }
}
