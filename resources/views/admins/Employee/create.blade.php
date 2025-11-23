<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

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
                placeholder="Nhập tên nhân viên"
            >
            @error('hoTen')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="ngaySinh">Ngày sinh</label>
            <input 
                type="date" value="{{ old('ngaySinh')}}"
                name="ngaySinh" id="ngaySinh" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"  max="{{ date('Y-m-d', strtotime('-18 years')) }}" >
            @error('ngaySinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Giới tính -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="gioiTinh">Giới tính</label>
            <select 
                name="gioiTinh" value="{{ old('gioiTinh')}}"
                id="gioiTinh" class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled {{ old('gioiTinh') === null ? 'selected' : '' }}>-- Chọn giới tính --</option>
                <option value="0" {{ old('gioiTinh') == '0' ? 'selected' : '' }}>Nam</option>
                <option value="1" {{ old('gioiTinh') == '1' ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gioiTinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Chức vụ -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="chucVu">Chức vụ</label>
            <select 
                name="chucVu" id="chucVu" class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled {{ old('chucVu') === null ? 'selected' : '' }}>-- Chọn chức vụ --</option>
                <option value="0" {{ old('chucVu') == '0' ? 'selected' : '' }}>Quản trị viên</option>
                <option value="1" {{ old('chucVu') == '1' ? 'selected' : '' }}>Tài vụ</option>
            </select>
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
                type="file" name="anhDaiDien" id="anhDaiDien" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                onchange="previewImage(event)">
            <img id="preview" class="mt-2 w-32 h-32 object-cover rounded-md hidden" alt="Preview">
        </div>

        <!-- Buttons -->
        <div class="flex space-x-3 pt-2">
            <a href="{{ route('nhanVien.index') }}" class="bg-[#828282] text-white px-4 py-2 rounded-md hover:bg-gray-700 text-[18px] font-semibold">
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