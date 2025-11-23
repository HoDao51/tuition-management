@extends('admins.layouts.app')
@section('content')
<div class="max-w-md bg-white">
    @error('duplicate')
        <div class="alert alert-danger text-red-600 font-semibold text-[20px]">
            {{ $message}}
        </div>
    @enderror
    <form action="{{ route('lop.update', $lop->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')

        <!-- Mã NV -->
        <div>
            <label for="id" class="block text-lg text-[#4B5563] mb-1">Mã lớp:</label>
            <input type="text" name="id" id="id" value="{{ $lop->id }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- tên khoa -->
        <div>
            <label for="tenLop" class="block text-lg text-[#4B5563] mb-1">Tên lớp</label>
            <input type="text" name="tenLop" id="tenLop" value="{{ old('tenLop', $lop->tenLop) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('tenLop')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <!-- chọn khoa -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="id_khoa">Chọn khoa</label>
            <select name="id_khoa" id="id_khoa" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled>Chọn khoa</option>
                @foreach($khoa as $khoa)
                    <option value="{{ $khoa->id }}" {{ $lop->id_khoa == $khoa->id ? 'selected' : '' }}>{{ $khoa->tenKhoa }}</option>
                @endforeach
            </select>
            @error('id_khoa')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('lop.index') }}" 
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
