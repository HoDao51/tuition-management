@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('hocKy.update', $hocKy->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')
        <!-- Mã -->
        <div>
            <label for="id" class="block text-lg text-[#4B5563] mb-1">Mã học kỳ:</label>
            <input type="text" name="id" id="id" value="{{ $hocKy->id }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-gray-100 cursor-not-allowed focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <div>
            <label for="id_nam_hoc" class="block text-lg text-[#4B5563] mb-1">Năm học</label>
            <input type="text" value="{{ $hocKy->namHoc->tenNamHoc }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            <input type="hidden" name="id_nam_hoc" value="{{ $hocKy->id_nam_hoc }}">
            @error('id_nam_hoc')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- tên học kỳ -->
        <div class="mb-4">
            <label for="tenHocKy" class="block text-lg text-[#4B5563] mb-1">Tên học kỳ</label>
            <div class="relative">
                <select name="tenHocKy" id="tenHocKy"
                    class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>-- Chọn học kỳ --</option>
                    <option value="0" {{ $hocKy->tenHocKy == 'Học Kỳ 1' ? 'selected' : '' }}>Học kỳ 1</option>
                    <option value="1" {{ $hocKy->tenHocKy == 'Học Kỳ 2' ? 'selected' : '' }}>Học kỳ 2</option>
                    <option value="2" {{ $hocKy->tenHocKy == 'Học Kỳ 3' ? 'selected' : '' }}>Học kỳ 3</option>
                    <option value="3" {{ $hocKy->tenHocKy == 'Học Kỳ 4' ? 'selected' : '' }}>Học kỳ 4</option>
                    <option value="4" {{ $hocKy->tenHocKy == 'Học Kỳ 5' ? 'selected' : '' }}>Học kỳ 5</option>
                    <option value="5" {{ $hocKy->tenHocKy == 'Học Kỳ 6' ? 'selected' : '' }}>Học kỳ 6</option>
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('tenHocKy')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicate')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('hocKy.index') }}" onclick="showLoader()"
                class="bg-[#828282] text-white px-4 py-2 rounded hover:bg-[#595959] text-[16px] font-semibold">
                Quay lại
            </a>
            <button type="submit" onclick="showLoader()"
                class="bg-[#10B981] text-white px-4 py-2 rounded hover:bg-[#1D8F6A] text-[16px] font-semibold">
                Cập nhật
            </button>
        </div>
    </form>
</div>
@endsection
