<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('hocKy.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf

        <!-- chọn năm học -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="id_nam_hoc">Chọn năm học</label>
            <select name="id_nam_hoc" id="id_nam_hoc"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>Chọn năm học</option>
                @foreach($namHoc as $namHoc)
                        <option value="{{ $namHoc->id }}" @selected(old('id_nam_hoc') == $namHoc->id)>{{ $namHoc->tenNamHoc }}</option>
                @endforeach
            </select>
            @error('id_nam_hoc')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Tên học kỳ -->
    <div>
        <label class="block text-lg text-[#4B5563] mb-1" for="tenHocKy">Tên học kỳ</label>
        <select name="tenHocKy" id="tenHocKy"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            <option value="" disabled {{ old('tenHocKy') === null ? 'selected' : '' }}>-- Chọn học kỳ --</option>
            <option value="0" {{ old('tenHocKy') == '0' ? 'selected' : '' }}>Học kỳ 1</option>
            <option value="1" {{ old('tenHocKy') == '1' ? 'selected' : '' }}>Học kỳ 2</option>
            <option value="2" {{ old('tenHocKy') == '2' ? 'selected' : '' }}>Học kỳ 3</option>
            <option value="3" {{ old('tenHocKy') == '3' ? 'selected' : '' }}>Học kỳ 4</option>
            <option value="4" {{ old('tenHocKy') == '4' ? 'selected' : '' }}>Học kỳ 5</option>
            <option value="5" {{ old('tenHocKy') == '5' ? 'selected' : '' }}>Học kỳ 6</option>
        </select> 
        @error('tenHocKy')
                <p class="text-red-500">{{$message}}</p>
        @enderror
        @error('duplicated')
                <p class="text-red-500">{{$message}}</p>
        @enderror
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