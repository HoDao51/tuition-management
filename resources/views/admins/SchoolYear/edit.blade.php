@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('namHoc.update', $namHoc->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')
        <!-- Mã năm học -->
        <div>
            <label for="id" class="block text-lg text-[#4B5563] mb-1">Mã năm học:</label>
            <input type="text" name="id" id="id" value="{{ $namHoc->id }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tên Năm học -->
        <div>
            <label for="tenNamHoc" class="block text-lg text-[#4B5563] mb-1">Tên năm học</label>
            <input type="text" name="tenNamHoc" id="tenNamHoc" value="{{ $namHoc->tenNamHoc }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Ngày bắt đầu -->
        <div>
            <label for="ngayBatDau" class="block text-lg text-[#4B5563] mb-1">Ngày bắt đầu</label>
            <input type="date" name="ngayBatDau" id="ngayBatDau" value="{{ old('ngayBatDau', \Carbon\Carbon::parse($namHoc->getRawOriginal('ngayBatDau'))->format('Y-m-d')) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('ngayBatDau')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicate')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('error')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày Kết thúc -->
        <div>
            <label for="ngayKetThuc" class="block text-lg text-[#4B5563] mb-1">Ngày kết thúc</label>
            <input type="date" name="ngayKetThuc" id="ngayKetThuc" value="{{ old('ngayKetThuc', \Carbon\Carbon::parse($namHoc->getRawOriginal('ngayKetThuc'))->format('Y-m-d')) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('ngayKetThuc')
                <p class="text-red-500">{{$message}}</p>
            @enderror 
            @error('duplicate')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('error')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('namHoc.index') }}" onclick="showLoader()"
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
