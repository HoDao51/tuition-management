@extends('admins.layouts.app')
@section('content')
<div class="max-w-md bg-white mb-6">

    <form action="{{ route('thongTinCaNhan.update') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')

        <!-- Mã NV -->
        <div>
            <label for="ma_nv" class="block text-lg text-[#4B5563] mb-1">Mã nhân viên:</label>
            <input type="text" name="ma_nv" id="ma_nv" value="{{ Auth::user()->nhanVien->ma_nv }}" readonly
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Họ tên -->
        <div>
            <label for="hoTen" class="block text-lg text-[#4B5563] mb-1">Họ tên</label>
            <input type="text" name="hoTen" id="hoTen" value="{{ old('hoTen', Auth::user()->nhanVien->hoTen) }}" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('hoTen')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label for="ngaySinh" class="block text-lg text-[#4B5563] mb-1">Ngày sinh</label>
            <input type="date" name="ngaySinh" id="ngaySinh" value="{{ \Carbon\Carbon::parse(Auth::user()->nhanVien->getRawOriginal('ngaySinh'))->format('Y-m-d') }}" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400" max="{{ date('Y-m-d', strtotime('-18 years')) }}">
            @error('ngaySinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Giới tính -->
        <div>
            <label for="gioiTinh" class="block text-lg text-[#4B5563] mb-1">Giới tính</label>
            <select name="gioiTinh" id="gioiTinh" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="0" {{ Auth::user()->nhanVien->gioiTinh == 0 ? 'selected' : '' }}>Nam</option>
                <option value="1" {{ Auth::user()->nhanVien->gioiTinh == 1 ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gioiTinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Chức vụ -->
        <div>
            <label for="chucVu" class="block text-lg text-[#4B5563] mb-1">Chức vụ</label>
            <select name="chucVu" id="chucVu" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="0" {{ Auth::user()->nhanVien->chucVu == 0 ? 'selected' : '' }}>Quản trị viên</option>
                <option value="1" {{ Auth::user()->nhanVien->chucVu == 1 ? 'selected' : '' }}>Tài vụ</option>
            </select>
            @error('chucVu')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Số điện thoại -->
        <div>
            <label for="soDienThoai" class="block text-lg text-[#4B5563] mb-1">Số điện thoại</label>
            <input type="text" name="soDienThoai" id="soDienThoai" value="{{ old('soDienThoai', Auth::user()->nhanVien->soDienThoai) }}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('soDienThoai')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-lg text-[#4B5563] mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->nhanVien->email)}}"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ảnh đại diện -->
        <div>
            <label for="anhDaiDien" class="block text-lg text-[#4B5563] mb-1">Ảnh đại diện</label>
            <input type="file" name="anhDaiDien" id="anhDaiDien" class="w-full border border-gray-300 rounded-md px-3 py-2">
            @if(Auth::user()->nhanVien->anhDaiDien)
                <img src="{{ asset('storage/'.Auth::user()->nhanVien->anhDaiDien) }}" alt="Ảnh đại diện" class="mt-2 w-24 h-24 object-cover rounded">
            @endif
        </div>

        <!-- Tình trạng -->
        <div>
            <label for="tinhTrang" class="block text-lg text-[#4B5563] mb-1">Tình trạng</label>
            <select name="tinhTrang" id="tinhTrang" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                <option value="0" {{ Auth::user()->nhanVien->tinhTrang == 0 ? 'selected' : '' }}>Đang hoạt động</option>
                <option value="1" {{ Auth::user()->nhanVien->tinhTrang == 1 ? 'selected' : '' }}>Ngưng hoạt động</option>
            </select>
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('thongTinCaNhan.index') }}" 
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
