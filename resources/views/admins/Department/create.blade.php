<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('content')
<div class="max-w-md bg-white">
    
    <form action="{{ route('khoa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <!-- Tên khoa -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="tenKhoa">Tên khoa</label>
            <input 
                type="text" value="{{ old('tenKhoa')}}"
                name="tenKhoa" id="tenKhoa" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên khoa"
            >
            @error('tenKhoa')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            @error('duplicate')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('khoa.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
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