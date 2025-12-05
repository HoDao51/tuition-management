@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('hocPhi.store') }}" method="POST" class="space-y-3">
        @csrf
        <!-- Sinh viên -->
        <div>
            <label class="block text-lg text-gray-600 mb-1">Sinh viên</label>
            <input type="text" value="{{ $sinhVien->hoTen }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">
            <input type="hidden" name="id_sinh_vien" value="{{ $sinhVien->id }}">
        </div>

        <!-- năm học -->
        <div>
            <label class="block text-lg text-gray-600 mb-1">Năm học</label>
            <input type="text" value="{{ $sinhVien->namHoc->tenNamHoc }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">
            <input type="hidden" name="" value="{{ $sinhVien->id }}">
        </div>

        <!-- Học kỳ -->
        <div class="mb-4">
            <label class="block text-lg text-gray-600 mb-1">Học kỳ</label>
            <div class="relative">
                <select name="id_hoc_ky" 
                        class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled selected>-- Chọn học kỳ --</option>
                    @foreach($hocKy as $hk)
                        <option value="{{ $hk->id }}" @selected(old('id_hoc_ky') == $hk->id)>{{ $hk->tenHocKy }}</option>
                    @endforeach
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('id_hoc_ky')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicated')
                    <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Tổng tiền -->
        <div>
            <label class="block text-lg text-gray-600 mb-1">Tổng tiền</label>
            <input type="number" value="{{old('tongTien')}}"
                name="tongTien" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <p class="text-sm text-gray-500 mt-1">
                    Tối đa: <strong>100.000.000đ</strong>
                </p>
            @error('tongTien')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('sinhVien.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded hover:bg-[#595959] text-[16px] font-semibold">
                Quay lại
            </a>
            <button 
                type="submit" onclick="showLoader()" class="bg-[#10B981] text-white px-7 py-2 rounded hover:bg-[#1D8F6A] text-[16px] font-semibold">
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection
