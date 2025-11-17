<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\bienLai;
use App\Models\Admin\sinhVien;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorebienLaiRequest;
use App\Http\Requests\UpdatebienLaiRequest;
use App\Models\Admin\hocPhi;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BienLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bienLai = BienLai::with('hocPhi.sinhVien', 'hocPhi.hocKy')
                  ->where('deleted', false)
                  ->orderBy('id','desc')
                  ->get();

        return view('admins.receipt.index', compact('bienLai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $hocPhiId = $request->query('hocPhi');
        $hocPhi = HocPhi::with(['sinhVien', 'hocKy.namHoc'])->findOrFail($hocPhiId);
        
        return view('admins.receipt.create', compact('hocPhi'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebienLaiRequest $request)
    {
        $id_hoc_phi = $request->id_hoc_phi;
        $soTienThu = $request->soTienThu;
        $ngayThu = $request->ngayThu;

        // Lấy đối tượng hocPhi tương ứng
        $hocPhi = HocPhi::findOrFail($id_hoc_phi);

        // Kiểm tra thuộc tính soTienDaThanhToan tồn tại và không null
        if (isset($hocPhi->soTienDaThanhToan)) {
            $soTienDaThu = $hocPhi->soTienDaThanhToan;
        } else {
            $soTienDaThu = 0; // Giá trị mặc định nếu null hoặc không tồn tại
        }

        // Tạo biên lai mới
        $bienLai = BienLai::create([
            'id_hoc_phi' => $id_hoc_phi,
            'soTienThu' => $soTienThu,
            'ngayThu' => $ngayThu,
            // 'nguoiThu' => auth()->id(), // Nếu có
        ]);

        // Cập nhật tổng số tiền đã thu
        $hocPhi->soTienDaThanhToan = $soTienDaThu + $soTienThu;

        // Cập nhật trạng thái thanh toán
        if ($hocPhi->soTienDaThanhToan >= $hocPhi->tongTien) {
            $hocPhi->tinhTrang = 1; // Đã thanh toán hết
        } else {
            $hocPhi->tinhTrang = 0; // Chưa thanh toán đủ
        }

        $hocPhi->save();

        return redirect()->route('bienLai.index')->with('success', 'Thêm biên lai thành công!');
    }



    /**
     * Display the specified resource.
     */
    public function show(bienLai $bienLai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bienLai = BienLai::with('hocPhi.sinhVien', 'hocPhi.hocKy', 'hocPhi.hocKy.namHoc')
                ->findOrFail($id);
        return view('admins.receipt.edit', compact('bienLai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebienLaiRequest $request, $id)
    {
        // Lấy biên lai
        $bienLai = BienLai::findOrFail($id);

        // Lấy học phí gốc
        $hocPhi = HocPhi::findOrFail($bienLai->id_hoc_phi);

        // Lấy số tiền cũ của biên lai
        $soTienCu = $bienLai->soTienThu;

        // Lấy số tiền mới từ form
        $soTienMoi = $request->soTienThu;

        // Cập nhật số tiền thu, ngày thu, tình trạng
        $bienLai->update([
            'soTienThu' => $soTienMoi,
            'ngayThu'   => $request->ngayThu,
            'tinhTrang' => $request->tinhTrang, // 0 = đã đóng, 1 = đã hủy
        ]);

        // Nếu biên lai bị hủy → coi như số tiền thu = 0
        if ($request->tinhTrang == 1) {
            $soTienMoi = 0;
        }

        // Cập nhật lại tổng tiền đã thanh toán
        // (trừ tiền cũ, cộng tiền mới)
        $hocPhi->soTienDaThanhToan = 
            ($hocPhi->soTienDaThanhToan - $soTienCu) + $soTienMoi;

        // Tránh giá trị âm
        if ($hocPhi->soTienDaThanhToan < 0) {
            $hocPhi->soTienDaThanhToan = 0;
        }

        // Cập nhật tình trạng học phí
        if ($hocPhi->soTienDaThanhToan >= $hocPhi->tongTien) {
            $hocPhi->tinhTrang = 1;  // đã thanh toán đủ
        } else {
            $hocPhi->tinhTrang = 0;  // chưa thanh toán đủ
        }

        $hocPhi->save();

        return redirect::route('bienLai.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bienLai $bienLai)
    {
        // Lấy học phí liên quan
        $hocPhi = HocPhi::findOrFail($bienLai->id_hoc_phi);
        // Trừ số tiền biên lai này khỏi tổng tiền đã thanh toán
        $hocPhi->soTienDaThanhToan -= $bienLai->soTienThu;

        // Cập nhật lại trạng thái học phí
        if ($hocPhi->soTienDaThanhToan >= $hocPhi->tongTien) {
            $hocPhi->tinhTrang = 1; // đã thanh toán đủ
        } else {
            $hocPhi->tinhTrang = 0; // chưa thanh toán đủ
        }

        $hocPhi->save();

        // Đánh dấu biên lai là đã xóa
        $bienLai->deleted = true;
        $bienLai->tinhTrang = 1; // đã hủy
        $bienLai->save();
        return redirect::route('bienLai.index');
    }
}
