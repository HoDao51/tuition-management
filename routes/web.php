<?php

use App\Http\Controllers\Admin\NhanVienController;
use App\Http\Controllers\Admin\SinhVienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/admins', function() {
    return view('admins.index'); // resources/views/admins/index.blade.php
})->name('admins.index');

Route::resource('/admins/nhanVien', NhanVienController::class);
Route::resource('/admins/sinhVien', SinhVienController::class);
Route::resource('/admins/khoa', SinhVienController::class);
Route::resource('/admins/lop', SinhVienController::class);
Route::resource('/admins/namHoc', SinhVienController::class);
Route::resource('/admins/hocKy', SinhVienController::class);
Route::resource('/admins/hocPhi', SinhVienController::class);
Route::resource('/admins/bienLai', SinhVienController::class);
