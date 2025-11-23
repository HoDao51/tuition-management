<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\khoa;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorekhoaRequest;
use App\Http\Requests\UpdatekhoaRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class KhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');
        // Query cơ bản
        $query = khoa::query();
        // Áp dụng tìm kiếm nếu có từ khóa (tìm theo hoTen, email, ma_nv)
        if ($search) {
            $query->where('tenKhoa', 'like', '%' . $search . '%');
        }
        // Phân trang (10 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->where('deleted', false)->paginate(5)->withQueryString();
        return view('admins.department.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekhoaRequest $request)
    {
        $tenKhoa = $request->tenKhoa;
        // Kiểm tra trùng lặp
        $existingKhoa = khoa::where('tenKhoa', $tenKhoa)
                            ->where('deleted', false)  
                            ->first();
        if ($existingKhoa) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Khoa ' . $existingKhoa->tenKhoa . ' đã tồn tại!'])->withInput();
        }
        $tenKhoa = khoa::create([
            'tenKhoa' => $tenKhoa,
        ]);

        return redirect::route('khoa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(khoa $khoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(khoa $khoa)
    {
        return view('admins.department.edit', compact('khoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekhoaRequest $request, Khoa $khoa)
    {
        $tenKhoa = $request->tenKhoa;

        // Kiểm tra trùng lặp, loại trừ bản ghi hiện tại
        $existingKhoa = Khoa::where('tenKhoa', $tenKhoa)
            ->where('deleted', false)
            ->where('id', '<>', $khoa->id)
            ->first();

        if ($existingKhoa) {
            return redirect()->back()
                ->withErrors([
                    'tenKhoa' => 'Khoa ' . $existingKhoa->tenKhoa . ' đã tồn tại!'
                ])
                ->withInput();
        }

        // Nếu không trùng, cập nhật bản ghi
        $khoa->update([
            'tenKhoa' => $tenKhoa,
        ]);

        return redirect::route('khoa.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(khoa $khoa)
    {
        $khoa->deleted = true;
        $khoa->save(); 
        return redirect::route('khoa.index');
    }
}
