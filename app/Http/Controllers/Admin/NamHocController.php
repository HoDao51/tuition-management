<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\namHoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorenamHocRequest;
use App\Http\Requests\UpdatenamHocRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class NamHocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $search = $request->get('search');
        // Query cơ bản
        $query = namHoc::query();
        // Áp dụng tìm kiếm nếu có từ khóa
        if ($search) {
            $query->where('tenNamHoc', 'like', '%' . $search . '%');
        }
        // Phân trang
        $data = $query->orderBy('id', 'desc')->where('deleted', false)->paginate(5)->withQueryString();
        return view('admins.schoolYear.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.schoolYear.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenamHocRequest $request)
    {
        $tenNamHoc = $request->tenNamHoc;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;
        // Kiểm tra trùng lặp
        $existingNamHoc = namHoc::where('tenNamHoc', $tenNamHoc)
                            ->where('deleted', false)  
                            ->first();
        if ($existingNamHoc) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Năm học ' . $existingNamHoc->tenNamHoc . ' đã tồn tại!'])->withInput();
        }

        $namHoc = namHoc::create([
            'tenNamHoc' => $tenNamHoc,
            'ngayBatDau' => $ngayBatDau,
            'ngayKetThuc' => $ngayKetThuc
        ]);

        return Redirect::route('namHoc.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(namHoc $namHoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(namHoc $namHoc)
    {
        return view('admins.schoolYear.edit', compact('namHoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenamHocRequest $request, namHoc $namHoc)
    {
        $tenNamHoc = $request->tenNamHoc;
        $ngayBatDau = $request->ngayBatDau;
        $ngayKetThuc = $request->ngayKetThuc;

        // Kiểm tra trùng lặp
        $existingNamHoc = namHoc::where('tenNamHoc', $tenNamHoc)
                            ->where('deleted', false)
                            ->where('id', '<>', $namHoc->id) 
                            ->first();
        if ($existingNamHoc) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Năm học ' . $existingNamHoc->tenNamHoc . ' đã tồn tại!'])->withInput();
        }
        $namHoc->update([
            'tenNamHoc' => $tenNamHoc,
            'ngayBatDau' => $ngayBatDau,
            'ngayKetThuc' => $ngayKetThuc
        ]);

        return Redirect::route('namHoc.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(namHoc $namHoc)
    {
        $namHoc->deleted = true;
        $namHoc->save(); 
        return redirect::route('namHoc.index');
    }
}
