<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/admins', function() {
    return view('admins.index'); // resources/views/admins/index.blade.php
})->name('admins.index');