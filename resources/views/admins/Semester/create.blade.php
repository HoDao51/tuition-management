<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white">
    @error('duplicate')
        <div class="alert alert-danger text-red-600 font-semibold text-[20px]">
            {{ $message}}
        </div>
    @enderror
    <form action="{{ route('hocKy.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf

        <!-- chọn năm học -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="id_nam_hoc">Chọn năm học</label>
            <select name="id_nam_hoc" id="id_nam_hoc" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>Chọn năm học</option>
                @foreach($namHoc as $namHoc)
                        <option value="{{ $namHoc->id }}">{{ $namHoc->tenNamHoc }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tên học kỳ -->
    <div>
        <label class="block text-lg text-[#4B5563] mb-1" for="tenHocKy">Tên học kỳ</label>
        <select name="tenHocKy" id="tenHocKy" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            <option value="" disabled selected>-- Chọn học kỳ --</option>
            <option value="0">Học kỳ 1</option>
            <option value="1">Học kỳ 2</option>
            <option value="2">Học kỳ 3</option>
            <option value="3">Học kỳ 4</option>
            <option value="4">Học kỳ 5</option>
            <option value="5">Học kỳ 6</option>
        </select> 
    </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{route('hocKy.index')}}" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
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