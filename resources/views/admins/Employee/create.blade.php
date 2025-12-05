@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white">
    <form action="{{ route('nhanVien.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        <!-- Tên nhân viên -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="hoTen">Tên nhân viên</label>
            <input 
                type="text" value="{{ old('hoTen')}}"
                name="hoTen" id="hoTen" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập tên nhân viên">
            @error('hoTen')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngaySinh">Ngày sinh</label>
            <input 
                type="date" value="{{ old('ngaySinh')}}"
                name="ngaySinh" id="ngaySinh" class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"  max="{{ date('Y-m-d', strtotime('-18 years')) }}" >
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#4B5563]" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('gioiTinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Chức vụ -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="chucVu">Chức vụ</label>
            <div class="relative">
                <select 
                    name="chucVu" id="chucVu" 
                    class="appearance-none text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled {{ old('chucVu') === null ? 'selected' : '' }}>-- Chọn chức vụ --</option>
                    <option value="0" {{ old('chucVu') == '0' ? 'selected' : '' }}>Quản trị viên</option>
                    <option value="1" {{ old('chucVu') == '1' ? 'selected' : '' }}>Tài vụ</option>
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#4B5563]" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
            @error('chucVu')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Số điện thoại -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="soDienThoai">Số điện thoại</label>
            <input 
                type="text" value="{{ old('soDienThoai') }}" 
                name="soDienThoai" id="soDienThoai" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập số điện thoại">
            @error('soDienThoai')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="email">Email</label>
            <input 
                type="email"  value="{{ old('email') }}" 
                name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
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
            <img id="preview" class="text-[#4B5563] mt-2 w-32 h-32 object-cover rounded-md hidden" alt="Preview">
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('nhanVien.index') }}" onclick="showLoader()" class="bg-[#828282] text-white px-4 py-2 rounded hover:bg-[#595959] text-[16px] font-semibold">
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