@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white p-4 rounded-md shadow-md">
    <form action="{{ route('bienLai.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Sinh viên -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Sinh viên</label>
            <input type="text" value="{{ $hocPhi->sinhVien->hoTen }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">

            <input type="hidden" name="id_hoc_phi" value="{{ $hocPhi->id }}">
        </div>

        <!-- Năm học -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Năm học</label>
            <input type="text" value="{{ $hocPhi->hocKy->namHoc->tenNamHoc}}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Học kỳ -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Học kỳ</label>

            <!-- Hiển thị tên học kỳ readonly -->
            <input type="text" value="{{ $hocPhi->hocKy->tenHocKy}}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">

            <!-- ẩn id học kỳ -->
            <input type="hidden" name="id_hoc_ky" value="{{ $hocPhi->hocKy->id ?? '' }}">
        </div>

        <!-- Tổng tiền -->
        <div>
            <label class="block text-sm text-gray-700 mb-1 font-semibold">Tổng tiền (VND)</label>
            <input type="text" value="{{ $hocPhi->tongTien}}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Số tiền đã đóng -->
        <div>
            <label>Số tiền thu</label>
            <input type="number" name="soTienThu"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400" 
                max="{{ $hocPhi->tongTien - $hocPhi->soTienDaThanhToan }}"
                value="{{ old('soTienThu') }}">
            @error('soTienThu')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày thu -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngayThu">Ngày thu</label>
            <input 
                type="date" name="ngayThu" id="ngayThu" max="{{now()->format('Y-m-d')}}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('ngayThu')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('hocPhi.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
                Quay lại
            </a>
            <button 
                type="submit" onclick="showLoader()" class="bg-[#10B981] text-white px-7 py-2 rounded-md hover:bg-green-700 text-[18px] font-semibold ">
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection