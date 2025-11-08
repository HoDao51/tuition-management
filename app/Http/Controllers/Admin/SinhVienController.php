<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\sinhVien;
use App\Http\Requests\StoresinhVienRequest;
use App\Http\Requests\UpdatesinhVienRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.layouts.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresinhVienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sinhVien $sinhVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sinhVien $sinhVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesinhVienRequest $request, sinhVien $sinhVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sinhVien $sinhVien)
    {
        //
    }
}
