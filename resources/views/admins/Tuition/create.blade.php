@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('hocPhi.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Sinh viên -->
        <div>
            <label for="id_sinh_vien" class="block text-sm text-gray-600 mb-1">Sinh viên</label>
            <input type="text" value="{{ $sinhVien->hoTen ?? '' }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100">
            <input type="hidden" name="id_sinh_vien" value="{{ $sinhVien->id }}">
        </div>

        <!-- Năm học -->
        <div>
            <label for="id_nam_hoc" class="block text-sm text-gray-600 mb-1">Năm học</label>
            <select name="id_nam_hoc" id="id_nam_hoc" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="">Chọn năm học</option>
                @foreach($namHoc as $nh)
                    <option value="{{ $nh->id }}">{{ $nh->tenNamHoc }}</option>
                @endforeach
            </select>
        </div>

        <!-- Học kỳ (cố định) -->
        <div>
            <label class="block text-sm text-gray-600 mb-1">Học kỳ</label>
            <input type="text" value="Học kỳ 1" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100">
                <option value="">Chọn học kỳ</option>
                    <select>

        <!-- Người tạo -->
        <div>
            <label for="nguoiTao" class="block text-sm text-gray-600 mb-1">Người tạo</label>
            <input type="text" value="{{ auth()->user()->hoTen ?? '' }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100">
            <input type="hidden" name="nguoiTao" value="{{ auth()->user()->id ?? '' }}">
        </div>

        <!-- Tổng tiền -->
        <div>
            <label for="tongTien" class="block text-sm text-gray-600 mb-1">Tổng tiền</label>
            <input type="number" name="tongTien" id="tongTien" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Tình trạng -->
        <div>
            <label for="tinhTrang" class="block text-sm text-gray-600 mb-1">Tình trạng</label>
            <select name="tinhTrang" id="tinhTrang" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="0" selected>Đang hoạt động</option>
                <option value="1">Ngưng hoạt động</option>
            </select>
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('hocPhi.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 transition">Quay lại</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Thêm học phí</button>
        </div>
    </form>
</div>

<script>
document.getElementById('id_nam_hoc').addEventListener('change', function() {
    const selectedNamHoc = this.value;
    const hocKySelect = document.getElementById('id_hoc_ky');
    const options = hocKySelect.options;

    for(let i = 0; i < options.length; i++) {
        const option = options[i];
        if(option.value === "") continue; // giữ option mặc định
        option.style.display = (option.dataset.namhoc == selectedNamHoc) ? 'block' : 'none';
    }

    // reset chọn lại học kỳ
    hocKySelect.value = "";
});
</script>
@endsection
