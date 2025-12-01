<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\hocKy;
use App\Models\Admin\namHoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorehocKyRequest;
use App\Http\Requests\UpdatehocKyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class HocKyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request 
        $search = $request->get('search');
        // Query cơ bản
        $query = hocKy::query();
        // Áp dụng tìm kiếm nếu có từ khóa
        if ($search) {
            $query->where('tenHocKy', 'like', '%' . $search . '%')
            ->orWhereHas('namHoc', function ($namHoc) use ($search) { 
                  $namHoc->where('tenNamHoc', 'like', '%' . $search . '%'); 
              });
        }
        // Phân trang
        $data = $query->orderBy('id', 'desc')->where('deleted', false)->paginate(5)->withQueryString();

        return view('admins.semester.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $namHoc = namHoc::where('deleted', false)->get();
        return view('admins.semester.create', compact('namHoc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorehocKyRequest $request)
    {
        $tenHocKy = $request->tenHocKy;
        $id_nam_hoc = $request->id_nam_hoc;

        if ($tenHocKy == 0) {
            $tenHocKy = 'Học Kỳ 1';
        }elseif ($tenHocKy == 1){
            $tenHocKy = 'Học Kỳ 2';
        }elseif ($tenHocKy == 2){
            $tenHocKy = 'Học Kỳ 3';
        }elseif ($tenHocKy == 3){
            $tenHocKy = 'Học Kỳ 4';
        }elseif ($tenHocKy == 4){
            $tenHocKy = 'Học Kỳ 5';
        }elseif ($tenHocKy == 5){
            $tenHocKy = 'Học Kỳ 6';
        }

        // Kiểm tra trùng lặp
        $existingHocKy = hocKy::where('tenHocKy', $tenHocKy)
                            ->where('id_nam_hoc', $id_nam_hoc)
                            ->where('deleted', false)  
                            ->first();
        if ($existingHocKy) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Năm học ' . $existingHocKy->namHoc->tenNamHoc . ' đã có học kỳ được chọn! Hãy chọn học kỳ khác!'])->withInput();
        }

        $hocKy = hocKy::create([
            'tenHocKy' => $tenHocKy,
            'id_nam_hoc' => $id_nam_hoc,
        ]);

        return redirect::route('hocKy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(hocKy $hocKy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hocKy $hocKy)
    {
        $namHoc = namHoc::where('deleted', false)->get();
        return view('admins.semester.edit', compact('hocKy', 'namHoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatehocKyRequest $request, hocKy $hocKy)
    {
        $tenHocKy = $request->tenHocKy;
        $id_nam_hoc = $request->id_nam_hoc;

        if ($tenHocKy == 0) {
            $tenHocKy = 'Học Kỳ 1';
        }elseif ($tenHocKy == 1){
            $tenHocKy = 'Học Kỳ 2';
        }elseif ($tenHocKy == 2){
            $tenHocKy = 'Học Kỳ 3';
        }elseif ($tenHocKy == 3){
            $tenHocKy = 'Học Kỳ 4';
        }elseif ($tenHocKy == 4){
            $tenHocKy = 'Học Kỳ 5';
        }elseif ($tenHocKy == 5){
            $tenHocKy = 'Học Kỳ 6';
        }

        // Kiểm tra trùng lặp
        $existingHocKy = hocKy::where('tenHocKy', $tenHocKy)
                            ->where('id_nam_hoc', $id_nam_hoc)
                            ->where('deleted', false)
                            ->where('id', '<>', $hocKy->id)
                            ->first();
        if ($existingHocKy) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Năm học ' . $existingHocKy->namHoc->tenNamHoc . ' đã có học kỳ được chọn! Hãy chọn học kỳ khác!'])->withInput();
        }

        $hocKy->update([
            'tenHocKy' => $tenHocKy,
            'id_nam_hoc' => $id_nam_hoc,
        ]);

        return redirect::route('hocKy.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hocKy $hocKy)
    {
        $hocKy->deleted = true;
        $hocKy->save(); 
        return redirect::route('hocKy.index');
    }
}
