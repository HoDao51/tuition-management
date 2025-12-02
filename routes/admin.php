<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SinhVienController;
use App\Http\Controllers\Admin\KhoaController;
use App\Http\Controllers\Admin\LopController;
use App\Http\Controllers\Admin\NamHocController;
use App\Http\Controllers\Admin\HocKyController;
use App\Http\Controllers\Admin\HocPhiController;
use App\Http\Controllers\Admin\BienLaiController;
use App\Http\Controllers\Admin\ThongTinCaNhan;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    // Trang chính admin
    Route::get('/admins', [DashboardController::class, 'index'])->name('admins.index');

    Route::resource('admins/nhanVien', NhanVienController::class);
    Route::post('restore/{nhanVien}', [NhanVienController::class, 'restore'])->name('restore');
    Route::resource('admins/sinhVien', SinhVienController::class);
    Route::resource('admins/khoa', KhoaController::class);
    Route::resource('admins/lop', LopController::class);
    Route::resource('admins/namHoc', NamHocController::class);
    Route::resource('admins/hocKy', HocKyController::class);
    Route::resource('admins/hocPhi', HocPhiController::class);
    Route::resource('admins/bienLai', BienLaiController::class);
    Route::get('admins/thongTinCaNhan', [ThongTinCaNhan::class, 'index'])->name('thongTinCaNhan.index');
    Route::get('admins/thongTinCaNhan/edit', [ThongTinCaNhan::class, 'edit'])->name('thongTinCaNhan.edit');
    Route::put('admins/thongTinCaNhan/update', [ThongTinCaNhan::class, 'update'])->name('thongTinCaNhan.update');
});