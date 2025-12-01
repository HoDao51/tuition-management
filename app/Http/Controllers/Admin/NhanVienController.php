<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\nhanVien;
use App\Models\User;
use App\Http\Requests\StorenhanVienRequest;
use App\Http\Requests\UpdatenhanVienRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $search = $request->get('search');
        // Query cơ bản
        $query = nhanVien::query();
        // Áp dụng tìm kiếm nếu có từ khóa
        if ($search) {
            $query->where('hoTen', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('ma_nv', 'like', '%' . $search . '%');
        }
        // Phân trang
        $nhanVien = $query->orderBy('tinhTrang', 'asc')->orderBy('chucVu', 'asc')->paginate(5)->withQueryString();

       // Trả về view với dữ liệu phân trang và từ khóa search
        return view('admins.employee.index', compact('nhanVien', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = nhanVien::all();
        return view('admins.employee.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorenhanVienRequest $request)
    {
        $password = $request->input('password', '123456');
        $user = User::create([
            'name' => $request->hoTen,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->chucVu
        ]);
        
        $hoTen = $request->hoTen;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $chucVu = $request->chucVu;
        $email = $request->email;
        $soDienThoai = $request->soDienThoai;
        // xử lý ảnh đại diện
        $path = null;
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien');
            $fileName = time() . "-" . $file->getClientOriginalName();
            //lưu trữ vào thư mục và CSDL
            $path = $file->storeAs('nhanVien', $fileName, 'public');
        }

        $nhanVien = nhanVien::create([
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'chucVu' => $chucVu,
            'email' => $email,
            'soDienThoai' => $soDienThoai,
            'anhDaiDien' => $path,
            'user_id' => $user->id,
        ]);

        // Tự sinh ma_nv theo id
        $ma_nv = 'NV' . str_pad($nhanVien->id, 3, '0', STR_PAD_LEFT);

        // Cập nhật ma_nv
        $nhanVien->update(['ma_nv' => $ma_nv]);

        return redirect::route('nhanVien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(nhanVien $nhanVien)
    {
        return view('admins.employee.employeeDetail', compact('nhanVien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nhanVien $nhanVien)
    {
        return view('admins.Employee.edit', compact('nhanVien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatenhanVienRequest $request, nhanVien $nhanVien)
    {
        $user = $nhanVien->user;
        if ($user) {
            $user->update([
                'name' => $request->hoTen,
                'email' => $request->email,
                'role' => $request->chucVu,
            ]);
        }

        $hoTen = $request->hoTen;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $chucVu = $request->chucVu;
        $email = $request->email;
        $soDienThoai = $request->soDienThoai;

        // Xử lý ảnh đại diện
        $path = $nhanVien->anhDaiDien;
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien');
            $fileName = time() . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('nhanVien', $fileName, 'public');
        }

        // Cập nhật thông tin nhân viên
        $nhanVien->update([
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'chucVu' => $chucVu,
            'email' => $email,
            'soDienThoai' => $soDienThoai,
            'anhDaiDien' => $path
        ]);

        return redirect::route('nhanVien.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nhanVien $nhanVien)
    {
        $nhanVien->tinhTrang = 1;
        $nhanVien->save(); 
        return redirect::route('nhanVien.index');
    }

    public function restore(nhanVien $nhanVien )
    {
        $nhanVien = nhanVien::findOrFail($nhanVien->id);
        $nhanVien->tinhTrang = 0;
        $nhanVien->save();  
        return redirect::route('nhanVien.index');
    }
}

