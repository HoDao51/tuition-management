@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('sinhVien.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <!-- Tên sinh viên -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="hoTen">Tên sinh viên</label>
            <input 
                type="text" value="{{ old('hoTen')}}"
                name="hoTen" id="hoTen"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên sinh viên">
            @error('hoTen')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- lớp -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="id_lop">Lớp</label>
            <div class="relative">
                <select 
                    name="id_lop" id="id_lop" 
                    class="appearance-none text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled selected>-- Chọn lớp --</option>
                    @foreach ($lop as $item)
                        <option value="{{ $item->id }}"  @selected(old('id_lop') == $item->id)>{{ $item->tenLop }}</option>
                    @endforeach
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('id_lop')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Năm học -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="id_nam_hoc">Năm học</label>
            <div class="relative">
                <select 
                    name="id_nam_hoc" id="id_nam_hoc" 
                    class="appearance-none text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled selected>-- Chọn năm học --</option>
                    @foreach ($namHoc as $item)
                        <option value="{{ $item->id }}" @selected(old('id_nam_hoc') == $item->id)>{{ $item->tenNamHoc }}</option>
                    @endforeach
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('id_nam_hoc')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngaySinh">Ngày sinh</label>
            <input 
                type="date" value="{{ old('ngaySinh')}}"
                name="ngaySinh" id="ngaySinh"  class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"  max="{{ date('Y-m-d', strtotime('-18 years')) }}" >
            @error('ngaySinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Giới tính -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="gioiTinh">Giới tính</label>
            <div class="relative">
                <select 
                    name="gioiTinh" value="{{ old('gioiTinh')}}"
                    id="gioiTinh" 
                    class="appearance-none text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled {{ old('gioiTinh') === null ? 'selected' : '' }}>-- Chọn giới tính --</option>
                    <option value="0" {{ old('gioiTinh') == '0' ? 'selected' : '' }}>Nam</option>
                    <option value="1" {{ old('gioiTinh') == '1' ? 'selected' : '' }}>Nữ</option>
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('gioiTinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>


        <!-- địa chỉ -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="diaChi">Địa chỉ</label>
            <input 
                type="text" value="{{ old('diaChi')}}"
                 name="diaChi" id="diaChi"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập địa chỉ">
            @error('diaChi')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Số điện thoại -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="soDienThoai">Số điện thoại</label>
            <input 
                type="text"  value="{{ old('soDienThoai')}}"
                name="soDienThoai" id="soDienThoai"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập số điện thoại">
            @error('soDienThoai')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="email">Email</label>
            <input 
                type="email" value="{{ old('email')}}"
                name="email" id="email"  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập email">
            @error('email')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ảnh đại diện -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="anhDaiDien">Ảnh đại diện</label>
            <input 
                type="file" name="anhDaiDien" id="anhDaiDien" class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                onchange="previewImage(event)">
            <img id="preview" class="mt-2 w-32 h-32 object-cover rounded-md hidden" alt="Preview">
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('sinhVien.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded hover:bg-[#595959] text-[16px] font-semibold">
                Quay lại
            </a>
            <button 
                type="submit" onclick="showLoader()" class="bg-[#10B981] text-white px-7 py-2 rounded hover:bg-[#1D8F6A] text-[16px] font-semibold">
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection