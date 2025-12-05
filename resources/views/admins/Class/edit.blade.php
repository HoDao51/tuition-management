@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('lop.update', $lop->id) }}" method="POST" class="space-y-3">
        @csrf
        @method('PUT')
        <!-- Mã lớp -->
        <div>
            <label for="id" class="block text-lg text-[#4B5563] mb-1">Mã lớp:</label>
            <input type="text" name="id" id="id" value="{{ $lop->id }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tên lớp -->
        <div>
            <label for="tenLop" class="block text-lg text-[#4B5563] mb-1">Tên lớp</label>
            <input type="text" name="tenLop" id="tenLop" value="{{ old('tenLop', $lop->tenLop) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('tenLop')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicate')
                <p class="text-red-500">
                    {{ $message}}
                </p>
            @enderror
        </div>
        
        <!-- chọn khoa -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="id_khoa">Chọn khoa</label>
            <div class="relative">
                <select name="id_khoa" id="id_khoa" 
                class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>-- Chọn khoa --</option>
                    @foreach($khoa as $khoa)
                        <option value="{{ $khoa->id }}" {{ $lop->id_khoa == $khoa->id ? 'selected' : '' }}>{{ $khoa->tenKhoa }}</option>
                    @endforeach
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('id_khoa')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('lop.index') }}" onclick="showLoader()"
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
