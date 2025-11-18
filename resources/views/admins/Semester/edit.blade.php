@extends('admins.layouts.app')
@section('content')
<div class="max-w-md bg-white">
    @error('duplicate')
        <div class="alert alert-danger text-red-600 font-semibold text-[20px]">
            {{ $message}}
        </div>
    @enderror
    <form action="{{ route('hocKy.update', $hocKy->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')

        <!-- Mã -->
        <div>
            <label for="id" class="block text-lg text-[#4B5563] mb-1">Mã học kỳ:</label>
            <input type="text" name="id" id="id" value="{{ $hocKy->id }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tên học kỳ -->
        <div>
            <label for="tenHocKy" class="block text-lg text-[#4B5563] mb-1">Tên học kỳ</label>
            <select name="tenHocKy" id="tenHocKy" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled>-- Chọn học kỳ --</option>
                <option value="0" {{ $hocKy->tenHocKy == 'Học Kỳ 1' ? 'selected' : '' }}>Học kỳ 1</option>
                <option value="1" {{ $hocKy->tenHocKy == 'Học Kỳ 2' ? 'selected' : '' }}>Học kỳ 2</option>
                <option value="2" {{ $hocKy->tenHocKy == 'Học Kỳ 3' ? 'selected' : '' }}>Học kỳ 3</option>
                <option value="3" {{ $hocKy->tenHocKy == 'Học Kỳ 4' ? 'selected' : '' }}>Học kỳ 4</option>
                <option value="4" {{ $hocKy->tenHocKy == 'Học Kỳ 5' ? 'selected' : '' }}>Học kỳ 5</option>
                <option value="5" {{ $hocKy->tenHocKy == 'Học Kỳ 6' ? 'selected' : '' }}>Học kỳ 6</option>
            </select>
        </div>
        <!-- chọn năm học -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="id_nam_hoc">Chọn năm học</label>
            <select name="id_nam_hoc" id="id_nam_hoc" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled>Chọn năm học</option>
                @foreach($namHoc as $namHoc)
                    <option value="{{ $namHoc->id }}" {{ $hocKy->id_nam_hoc == $namHoc->id ? 'selected' : '' }}>{{ $namHoc->tenNamHoc }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('hocKy.index') }}" 
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
