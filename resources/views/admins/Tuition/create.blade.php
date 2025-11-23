@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white p-4">
    <form action="{{ route('hocPhi.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Sinh viên -->
        <div>
            <label class="block text-sm text-gray-600 mb-1">Sinh viên</label>
            <input type="text" value="{{ $sinhVien->hoTen }}" readonly
                   class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 focus:outline-none focus:ring-1 focus:ring-green-400">
            <input type="hidden" name="id_sinh_vien" value="{{ $sinhVien->id }}">
            
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
            <select name="id_hoc_ky" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>-- Chọn học kỳ --</option>
                @foreach($hocKy as $hk)
                    <option value="{{ $hk->id }}" @selected(old('id_hoc_ky') == $hk->id)>{{ $hk->tenHocKy }}</option>
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
            <label class="block text-sm text-gray-600 mb-1">Tổng tiền</label>
            <input type="number" value="{{old('tongTien')}}"
                name="tongTien" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <p class="text-sm text-gray-500 mt-1">
                    Tối đa: <strong>100.000.000đ</strong>
                </p>
            @error('tongTien')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="flex space-x-3 pt-4">
            <a href="{{ route('sinhVien.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 transition">Quay lại</a>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">Thêm học phí</button>
        </div>
    </form>
</div>
@endsection
