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
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class HocPhiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(hocPhi $hocPhi)
    {
        $data = hocPhi::with('hocKy.namHoc', 'sinhVien')->where('deleted', false)->orderBy('id', 'desc')->get();
        return view('admins.tuition.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $sinhVienId = $request->query('sinhVien');
        $sinhVien = sinhVien::with('namHoc')->find($sinhVienId);
        $hocKy = hocKy::where('id_nam_hoc', $sinhVien->id_nam_hoc)->where('deleted', false)->get();

        return view('admins.tuition.create', compact('sinhVien', 'hocKy'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorehocPhiRequest $request)
    {
        $id_sinh_vien = $request->id_sinh_vien;
        $id_hoc_ky = $request->id_hoc_ky;
        $tongTien = $request->tongTien;

        $exists = hocPhi::where('id_sinh_vien', $request->id_sinh_vien)
                    ->where('id_hoc_ky', $request->id_hoc_ky)
                    ->exists();

        if ($exists) {
            return back()->withErrors([
                'duplicated' => 'Sinh viên này đã có học phí trong học kỳ này!'
            ])->withInput();
        }

        $hocPhi = hocPhi::create([
            'id_sinh_vien' => $id_sinh_vien,
            'id_hoc_ky' => $id_hoc_ky,
            'tongTien' => $tongTien,
        ]);

        return redirect::route('hocPhi.index');
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
        $sinhVien = sinhVien::with('namHoc')->find($hocPhi->id_sinh_vien);
        $hocKy = hocKy::where('id_nam_hoc', $sinhVien->id_nam_hoc)->where('deleted', false)->get();

        return view('admins.tuition.edit', compact('hocPhi', 'sinhVien', 'hocKy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehocPhiRequest $request, hocPhi $hocPhi)
    {
        $id_hoc_ky = $request->id_hoc_ky;
        $tongTien = $request->tongTien;
        $tinhTrang = $request->tinhTrang;

        $hocPhi->update([
            'id_hoc_ky' => $id_hoc_ky,
            'tongTien' => $tongTien,
            'tinhTrang' => $tinhTrang
        ]);

        return Redirect::route('hocPhi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocPhi $hocPhi)
    {
        $hocPhi->deleted = true;
        $hocPhi->save(); 
        return redirect::route('hocPhi.index');
    }
}
