@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('khoa.update', $khoa->id) }}" method="POST" class="space-y-3">
        @csrf
        @method('PUT')
        <!-- Mã khoa -->
        <div>
            <label for="ma_nv" class="block text-lg text-[#4B5563] mb-1">Mã khoa:</label>
            <input type="text" name="ma_nv" id="ma_nv" value="{{ $khoa->id }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tên khoa -->
        <div>
            <label for="tenKhoa" class="block text-lg text-[#4B5563] mb-1">Tên khoa</label>
            <input type="text" name="tenKhoa" id="tenKhoa" value="{{ old('tenKhoa', $khoa->tenKhoa) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('tenKhoa')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('khoa.index') }}" onclick="showLoader()"
                class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500 transition text-[18px]">
                Quay lại
            </a>
            <button type="submit" onclick="showLoader()"
                class="bg-[#10B981] text-white px-4 py-2 rounded-md hover:bg-[#1D8F6A] transition text-[18px]">
                Cập nhật
            </button>
        </div>
    </form>
</div>
@endsection
