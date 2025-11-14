<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\hocPhi;
use App\Models\Admin\hocKy;
use App\Models\Admin\sinhVien;
use App\Models\Admin\namHoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorehocPhiRequest;
use App\Http\Requests\UpdatehocPhiRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class HocPhiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.tuition.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sinhVienId = $request->query('sinhVien');
        $sinhVien = SinhVien::with('namHoc')->find($sinhVienId); // lấy luôn năm học
        $hocKy = hocKy::where('id_nam_hoc', $sinhVien->id_nam_hoc)->where('deleted', false)->get();

        return view('admins.tuition.create', compact('sinhVien', 'hocKy'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorehocPhiRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(hocPhi $hocPhi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hocPhi $hocPhi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehocPhiRequest $request, hocPhi $hocPhi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocPhi $hocPhi)
    {
        //
    }
}
