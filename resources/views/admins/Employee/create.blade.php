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
                type="text" name="hoTen" id="hoTen" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
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
                type="date" name="ngaySinh" id="ngaySinh" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"  max="{{ date('Y-m-d', strtotime('-18 years')) }}" >
        </div>

        <!-- Giới tính -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="gioiTinh">Giới tính</label>
            <select 
                name="gioiTinh" id="gioiTinh" required class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>-- Chọn giới tính --</option>
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
            </select>
        </div>

        <!-- Chức vụ -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="chucVu">Chức vụ</label>
            <select 
                name="chucVu" id="chucVu" required class="text-[#4B5563] w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="" disabled selected>-- Chọn chức vụ --</option>
                <option value="0">Quản trị viên</option>
                <option value="1">Tài vụ</option>
            </select>
        </div>

        <!-- Số điện thoại -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="soDienThoai">Số điện thoại</label>
            <input 
                type="text" name="soDienThoai" id="soDienThoai" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập số điện thoại">
        </div>

        <!-- Email -->
        <div>
            <label class="block text-lg text-[#4B5563] mb-1" for="email">Email</label>
            <input 
                type="email" name="email" id="email" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400"
                placeholder="Nhập email">
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