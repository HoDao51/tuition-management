<?php

use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SinhVienController;
use App\Http\Controllers\Admin\KhoaController;
use App\Http\Controllers\Admin\LopController;
use App\Http\Controllers\Admin\NamHocController;
use App\Http\Controllers\Admin\HocKyController;
use App\Http\Controllers\Admin\HocPhiController;
use App\Http\Controllers\Admin\BienLaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
// Trang chính admin
Route::get('/admins', function() {
    return view('admins.index');
})->name('admins.index');

Route::resource('admins/nhanVien', NhanVienController::class);
Route::resource('admins/sinhVien', SinhVienController::class);
Route::resource('admins/khoa', KhoaController::class);
Route::resource('admins/lop', LopController::class);
Route::resource('admins/namHoc', NamHocController::class);
Route::resource('admins/hocKy', HocKyController::class);
Route::resource('admins/hocPhi', HocPhiController::class);
Route::resource('admins/bienLai', BienLaiController::class);

