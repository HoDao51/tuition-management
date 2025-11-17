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

        $sinhVienDaDong = SinhVien::whereHas('hocPhi')->whereDoesntHave('hocPhi', function($q) {
            $q->whereColumn('soTienDaThanhToan', '<', 'tongTien');
        })->count();

        $chuaDong = $tongSinhVien - $sinhVienDaDong;

        return view('admins.dashboard.index', compact(
            'tongNhanVien',
            'tongSinhVien',
            'sinhVienDaDong',
            'chuaDong'
        ));
    }
}
