<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class ThongTinCaNhanController extends Controller
{
    public function index(){
        return view('students.information.index');
    }
}
