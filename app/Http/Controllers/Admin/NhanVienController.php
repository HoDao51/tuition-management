<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\nhanVien;
use App\Http\Requests\StorenhanVienRequest;
use App\Http\Requests\UpdatenhanVienRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class NhanVienController extends Controller
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
    public function store(StorenhanVienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(nhanVien $nhanVien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nhanVien $nhanVien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenhanVienRequest $request, nhanVien $nhanVien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nhanVien $nhanVien)
    {
        //
    }
}
