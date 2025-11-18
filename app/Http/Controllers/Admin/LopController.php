<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\lop;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorelopRequest;
use App\Http\Requests\UpdatelopRequest;
use App\Models\Admin\khoa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');
        // Query cơ bản
        $query = lop::query();
        // Áp dụng tìm kiếm nếu có từ khóa (tìm theo hoTen, email, ma_nv)
        if ($search) {
            $query->where('tenLop', 'like', '%' . $search . '%')
            ->orWhereHas('khoa', function ($khoa) use ($search) {  // Tìm trong quan hệ khoa
                  $khoa->where('tenKhoa', 'like', '%' . $search . '%');  // Giả sử trường tên khoa là 'tenKhoa'
              });
        }
        // Phân trang (10 item/trang, giữ query string để search không bị mất khi phân trang)
        $data = $query->orderBy('id', 'desc')->where('deleted', false)->paginate(5)->withQueryString();
        return view('admins.class.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $khoa = khoa::where('deleted', false)->get();
        return view('admins.class.create', compact('khoa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelopRequest $request)
    {
        $tenLop = $request->tenLop;
        $id_khoa = $request->id_khoa;
        // Kiểm tra trùng lặp
        $existingLop = lop::where('tenLop', $tenLop)
                            ->where('id_khoa', $id_khoa)
                            ->where('deleted', false)  
                            ->first();
        if ($existingLop) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Khoa ' . $existingLop->khoa->tenKhoa . ' đã có lớp này!'])->withInput();
        }

        $Lop = lop::create([
            'tenLop' => $tenLop,
            'id_khoa' => $id_khoa,
        ]);

        return redirect::route('lop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(lop $lop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lop $lop)
    {
        $khoa = khoa::where('deleted', false)->get();
        return view('admins.class.edit', compact('lop', 'khoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelopRequest $request, lop $lop)
    {
        $tenLop = $request->tenLop;
        $id_khoa = $request->id_khoa;

        // Kiểm tra trùng lặp
        $existingLop = lop::where('tenLop', $tenLop)
                            ->where('id_khoa', $id_khoa)
                            ->where('deleted', false)  
                            ->first();
        if ($existingLop) {
            // Trả về với lỗi
            return redirect()->back()->withErrors(['duplicate' => 'Khoa ' . $existingLop->khoa->tenKhoa . ' đã có lớp này!'])->withInput();
        }
        $lop->update([
            'tenLop' => $tenLop,
            'id_khoa' => $id_khoa,
        ]);

        return redirect::route('lop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lop $lop)
    {
        $lop->deleted = true;
        $lop->save(); 
        return redirect::route('khoa.index');
    }
}
