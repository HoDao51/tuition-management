<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\sinhVien;
use App\Models\Admin\lop;
use App\Models\User;
use App\Http\Requests\StoresinhVienRequest;
use App\Http\Requests\UpdatesinhVienRequest;
use App\Models\Admin\namHoc;
use Database\Seeders\SinhVienSeeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request (từ form)
        $search = $request->get('search');
        // Query cơ bản
        $query = sinhVien::query();
        // Áp dụng tìm kiếm nếu có từ khóa (tìm theo hoTen, email, ma_nv)
        if ($search) {
            $query->where('hoTen', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhereHas('lop', function ($lop) use ($search) {  // Tìm trong quan hệ khoa
                  $lop->where('tenLop', 'like', '%' . $search . '%');  // Giả sử trường tên khoa là 'tenKhoa'
              })
                ->orWhere('ma_sv', 'like', '%' . $search . '%');
        }
        // Phân trang (10 item/trang, giữ query string để search không bị mất khi phân trang)
       // Sắp xếp theo lớp
        $data = $query ->orderBy('tinhTrang', 'asc')
                    ->orderBy('id_lop', 'asc')
                    ->orderBy('id', 'desc')
                    ->paginate(10)
                    ->withQueryString();

            return view('admins.student.index', compact('data', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lop = lop::where('deleted', false)->get();
        $namHoc = namHoc::where('deleted', false)->get();
        return view('admins.student.create', compact('lop', 'namHoc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresinhVienRequest $request)
    {
        $password = $request->input('password', '123456'); // hoặc yêu cầu nhập password trong form
        $user = User::create([
            'name' => $request->hoTen,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        $hoTen = $request->hoTen;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $diaChi = $request->diaChi;
        $soDienThoai = $request->soDienThoai;
        $email = $request->email;
        $id_lop = $request->id_lop;
        $id_nam_hoc = $request->id_nam_hoc;
        // xử lý ảnh đại diện
        $path = null;
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien');
            //tạo vị trí lưu CSDL và thư mục
            $fileName = time() . "-" . $file->getClientOriginalName();
            //lưu trữ vào thư mục và CSDL
            $path = $file->storeAs('sinhVien', $fileName, 'public');
        }
        // Tạo sinh viên và gán vào biến
        $sinhVien = sinhVien::create([
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'diaChi' => $diaChi,
            'soDienThoai' => $soDienThoai,
            'email' => $email,
            'id_lop' => $id_lop,
            'id_nam_hoc' => $id_nam_hoc,
            'anhDaiDien' => $path,
            'user_id' => $user->id,
        ]);

        // Tự sinh ma_nv theo id
        $ma_sv = 'SV' . str_pad($sinhVien->id, 3, '0', STR_PAD_LEFT);

        // Cập nhật ma_nv
        $sinhVien->update(['ma_sv' => $ma_sv]);

        return redirect::route('sinhVien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(sinhVien $sinhVien)
    {
        $sinhVien->load('lop.khoa');
        $namHoc = namHoc::where('deleted', false)->get();
        return view('admins.student.studentDetail', compact('sinhVien', 'namHoc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sinhVien $sinhVien)
    {
        $lop = lop::where('deleted', false)->get();
        $namHoc = namHoc::where('deleted', false)->get();
        return view('admins.student.edit', compact('sinhVien', 'lop', 'namHoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesinhVienRequest $request, sinhVien $sinhVien)
    {
        $user = $sinhVien->user; // Lấy user liên kết

        if ($user) {
            $user->update([
                'name' => $request->hoTen,
                'email' => $request->email,
            ]);
        }

        $hoTen = $request->hoTen;
        $ngaySinh = $request->ngaySinh;
        $gioiTinh = $request->gioiTinh;
        $diaChi = $request->diaChi;
        $soDienThoai = $request->soDienThoai;
        $email = $request->email;
        $tinhTrang = $request->tinhTrang;
        $id_lop = $request->id_lop;
        $id_nam_hoc = $request->id_nam_hoc;

        // Xử lý ảnh đại diện
        $path = $sinhVien->anhDaiDien; // giữ ảnh cũ nếu không upload mới
        if ($request->hasFile('anhDaiDien')) {
            $file = $request->file('anhDaiDien');
            $fileName = time() . "-" . $file->getClientOriginalName();
            $path = $file->storeAs('sinhVien', $fileName, 'public');
        }

        // Tạo sinh viên và gán vào biến
        $sinhVien->update([
            'hoTen' => $hoTen,
            'ngaySinh' => $ngaySinh,
            'gioiTinh' => $gioiTinh,
            'diaChi' => $diaChi,
            'soDienThoai' => $soDienThoai,
            'email' => $email,
            'id_lop' => $id_lop,
            'id_nam_hoc' => $id_nam_hoc,
            'tinhTrang' => $tinhTrang,
            'anhDaiDien' => $path
        ]);

        return redirect::route('sinhVien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sinhVien $sinhVien)
    {
        //
    }
}