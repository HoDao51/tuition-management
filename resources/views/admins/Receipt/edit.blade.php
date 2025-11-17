@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white p-4 rounded-md shadow-md">
    <form action="{{ route('bienLai.update', $bienLai->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Sinh viên -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Sinh viên</label>
            <input type="text" value="{{ $bienLai->hocPhi->sinhVien->hoTen }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed">

            <input type="hidden" name="id_hoc_phi" value="{{ $bienLai->id_hoc_phi }}">
        </div>

        <!-- Năm học -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Năm học</label>
            <input type="text" value="{{ $bienLai->hocPhi->hocKy->namHoc->tenNamHoc }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed">
        </div>

        <!-- Học kỳ -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Học kỳ</label>

            <!-- Hiển thị tên học kỳ readonly -->
            <input type="text" value="{{ $bienLai->hocPhi->hocKy->tenHocKy }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed">

            <!-- ẩn id học kỳ -->
            <input type="hidden" name="id_hoc_ky" value="{{ $bienLai->hocPhi->hocKy->id ?? '' }}">
        </div>

        <!-- Tổng tiền -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Tổng tiền (VND)</label>
            <input type="text" value="{{ number_format($bienLai->hocPhi->tongTien, 0, ',', '.') }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed">
        </div>

        <!-- Số tiền thu -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Số tiền thu (VNĐ)</label>
            <input type="number" name="soTienThu" min="0"
                   max="{{ $bienLai->hocPhi->tongTien - $bienLai->hocPhi->soTienDaThanhToan + $bienLai->soTienThu }}"
                   value="{{ old('soTienThu', $bienLai->soTienThu) }}"
                   required
                   class="w-full border border-gray-300 rounded-md px-3 py-2">
        </div>

        <!-- Ngày thu -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold" for="ngayThu">Ngày thu</label>
            <input type="date" name="ngayThu" id="ngayThu" required max="{{now()->format('Y-m-d')}}"
                   value="{{ \Carbon\Carbon::parse($bienLai->getRawOriginal('ngayThu'))->format('Y-m-d') }}"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tinh trạng -->
        <div>
            <label for="tinhTrang" class="block text-lg text-[#4B5563] mb-1">Tình trạng</label>
            <select name="tinhTrang" id="tinhTrang" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="0" {{ $bienLai->tinhTrang == 0 ? 'selected' : '' }}>Đã đóng</option>
                <option value="1" {{ $bienLai->tinhTrang == 1 ? 'selected' : '' }}>Đã hủy</option>
            </select>
        </div>

        <div class="flex space-x-3 pt-4">
            <a href="{{ route('bienLai.index') }}"
               class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 transition">Quay lại</a>
            <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Cập nhật biên lai</button>
        </div>
    </form>
</div>
@endsection