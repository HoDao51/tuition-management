<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white">
    @error('duplicate')
        <div class="alert alert-danger text-red-600 font-semibold text-[20px]">
            {{ $message}}
        </div>
    @enderror
    <form action="{{ route('lop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <!-- Tên lớp -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="tenLop">Tên lớp</label>
            <input type="text" name="tenLop" id="tenLop" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400" placeholder="Nhập tên lớp">
        </div>

        <!-- chọn khoa -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="id_khoa">Chọn khoa</label>
            <select name="id_khoa" id="id_khoa" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>Chọn khoa</option>
                @foreach($khoa as $khoa)
                        <option value="{{ $khoa->id }}">{{ $khoa->tenKhoa }}</option>
                @endforeach
            </select>
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{route('lop.index')}}" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
                Quay lại
            </a>
            <button 
                type="submit" class="bg-[#10B981] text-white px-7 py-2 rounded-md hover:bg-green-700 text-[18px] font-semibold ">
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection