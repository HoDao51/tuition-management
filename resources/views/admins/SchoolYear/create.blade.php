@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('namHoc.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <!-- Tên năm học -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="tenNamHoc">Tên năm học</label>
            <input type="text" value="{{old('tenNamHoc')}}"
            name="tenNamHoc" id="tenNamHoc" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên năm học">
            @error('tenNamHoc')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicate')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- ngày bắt đầu -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngayBatDau">Ngày bắt đầu</label>
            <input type="date" value="{{old('ngayBatDau')}}"
            name="ngayBatDau" id="ngayBatDau" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên năm học">
            @error('ngayBatDau')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- ngày kết thúc -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngayKetThuc">Ngày kết thúc</label>
            <input type="date" value="{{old('ngayKetThuc')}}"
            name="ngayKetThuc" id="ngayKetThuc" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên năm học">
            @error('ngayKetThuc')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('namHoc.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
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