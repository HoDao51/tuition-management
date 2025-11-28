<?php

use App\Http\Controllers\Student\readBienLaiController;
use App\Http\Controllers\Student\readHocPhiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\ThongTinCaNhanController;

Route::middleware(['auth', 'student'])->group(function () {
    // Trang chính student
    Route::get('/students', [readHocPhiController::class, 'index'])->name('students.index');
    Route::resource('students/thongTinHocPhi', readHocPhiController::class);
    Route::resource('students/thongTinBienLai', readBienLaiController::class);
    Route::get('students/thongTinCaNhan', [ThongTinCaNhanController::class, 'index'])->name('students.thongTinCaNhan.index');
});