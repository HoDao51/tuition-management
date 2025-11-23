@extends('admins.layouts.app')
@section('content')
<div class="max-w-md bg-white p-6 rounded-md shadow">

    <form action="{{ route('hocPhi.update', $hocPhi->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Mã học phí -->
        <div>
            <label class="block text-lg text-gray-700 mb-1">Mã sinh viên:</label>
            <input type="text" value="{{ $hocPhi->sinhVien->ma_sv }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Sinh viên -->
        <div>
            <label class="block text-lg text-gray-700 mb-1">Sinh viên:</label>
            <input type="text" value="{{ $sinhVien->hoTen }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- năm học -->
        <div>
            <label class="block text-sm text-gray-600 mb-1">Năm học</label>
            <input type="text" value="{{ $sinhVien->namHoc->tenNamHoc }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-1 focus:ring-green-400">
            <input type="hidden" name="" value="{{ $sinhVien->id }}">
        </div>

        <!-- Học kỳ -->
        <div>
            <label class="block text-sm text-gray-600 mb-1">Học kỳ</label>
            <select name="id_hoc_ky" required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">

                <option value="" disabled>-- Chọn học kỳ --</option>

                @foreach($hocKy as $hk)
                    <option value="{{ $hk->id }}"
                        {{ $hocPhi->id_hoc_ky == $hk->id ? 'selected' : '' }}>
                        {{ $hk->tenHocKy }}
                    </option>
                @endforeach
            </select>
            @error('id_hoc_ky')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicated')
                    <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Tổng tiền -->
        <div>
            <label class="block text-lg text-gray-700 mb-1">Tổng tiền:</label>
            <input type="number" name="tongTien" value="{{ old('tongTien', $hocPhi->tongTien) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <p class="text-sm text-gray-500 mt-1">
                    Tối đa: <strong>100.000.000đ</strong>
                </p>
            @error('tongTien')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Trạng thái -->
        <div>
            <label class="block text-lg text-gray-700 mb-1">Tình Trạng:</label>
            <select name="tinhTrang"
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">

                <option value="0" {{ $hocPhi->trangThai == 0 ? 'selected' : '' }}>Chưa thanh toán</option>
                <option value="1" {{ $hocPhi->trangThai == 1 ? 'selected' : '' }}>Đã thanh toán</option>

            </select>
        </div>

        <!-- Nút -->
        <div class="flex space-x-3 pt-4 mb-4"">
            <a href="{{ route('hocPhi.index') }}"
                class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 transition text-[18px]">
                Quay lại
            </a>

            <button type="submit"
                class="bg-[#10B981] text-white px-4 py-2 rounded-md hover:bg-[#1D8F6A] transition text-[18px]">
                Cập nhật
            </button>
        </div>

    </form>
</div>
@endsection
