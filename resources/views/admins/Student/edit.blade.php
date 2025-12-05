@extends('layouts.app')
@section('content')
<div class="max-w-md bg-white mb-6">
    <form action="{{ route('sinhVien.update', $sinhVien->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')
        <!-- Mã SV -->
        <div>
            <label for="ma_sv" class="block text-lg text-[#4B5563] mb-1">Mã sinh viên:</label>
            <input type="text" name="ma_sv" id="ma_sv" value="{{ $sinhVien->ma_sv }}" readonly
                class="w-full border border-gray-300 bg-gray-100 cursor-not-allowed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
        </div>

        <!-- Họ tên -->
        <div>
            <label for="hoTen" class="block text-lg text-[#4B5563] mb-1">Họ tên</label>
            <input type="text" name="hoTen" id="hoTen" value="{{ old('hoTen', $sinhVien->hoTen) }}" 
            placeholder="Nhập tên sinh viên"    
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('hoTen')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ngày sinh -->
        <div>
            <label for="ngaySinh" class="block text-lg text-[#4B5563] mb-1">Ngày sinh</label>
            <input type="date" name="ngaySinh" id="ngaySinh" value="{{ \Carbon\Carbon::parse($sinhVien->getRawOriginal('ngaySinh'))->format('Y-m-d') }}" 
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400" max="{{ date('Y-m-d', strtotime('-18 years')) }}">
            @error('ngaySinh')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Giới tính -->
        <div class="mb-4">
            <label for="gioiTinh" class="block text-lg text-[#4B5563] mb-1">Giới tính</label>
            <div class="relative">
                <select name="gioiTinh" id="gioiTinh" 
                    class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>Chọn giới tính</option>
                    <option value="0" {{ $sinhVien->gioiTinh == 0 ? 'selected' : '' }}>Nam</option>
                    <option value="1" {{ $sinhVien->gioiTinh == 1 ? 'selected' : '' }}>Nữ</option>
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

        <!-- lớp -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="id_lop">Chọn lớp</label>
            <div class="relative">
                <select name="id_lop" id="id_lop"
                    class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 pr-10 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>Chọn lớp</option>
                    @foreach($lop as $lop)
                        <option value="{{ $lop->id }}" {{ $sinhVien->id_lop == $lop->id ? 'selected' : '' }}>
                            {{ $lop->tenLop }}
                        </option>
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

        <!-- năm học -->
        <div class="mb-4">
            <label class="block text-lg text-[#4B5563] mb-1" for="id_nam_hoc">Chọn năm học</label>
            <div class="relative">
                <select name="id_nam_hoc" id="id_nam_hoc"  
                class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>Chọn năm học</option>
                    @foreach($namHoc as $namHoc)
                        <option value="{{ $namHoc->id }}" {{ $sinhVien->id_nam_hoc == $namHoc->id ? 'selected' : '' }}>{{ $namHoc->tenNamHoc }}</option>
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

        <!-- Địa chỉ -->
        <div>
            <label for="diaChi" class="block text-lg text-[#4B5563] mb-1">Địa chỉ</label>
            <input type="text" name="diaChi" id="diaChi" value="{{ old('diaChi', $sinhVien->diaChi) }}" 
            placeholder="Nhập địa chỉ"    
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('diaChi')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Số điện thoại -->
        <div>
            <label for="soDienThoai" class="block text-lg text-[#4B5563] mb-1">Số điện thoại</label>
            <input type="text" name="soDienThoai" id="soDienThoai" value="{{ old('soDienThoai', $sinhVien->soDienThoai) }}" 
            placeholder="Nhập số điện thoại"    
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('soDienThoai')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- email -->
        <div>
            <label for="email" class="block text-lg text-[#4B5563] mb-1">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email', $sinhVien->email) }}" 
            placeholder="Nhập email"    
            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-green-400">
            @error('email')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <!-- Ảnh đại diện -->
        <div>
            <label for="anhDaiDien" class="block text-lg text-[#4B5563] mb-1">Ảnh đại diện</label>
            <input type="file" name="anhDaiDien" id="anhDaiDien" class="w-full border border-gray-300 rounded-md px-3 py-2">
            @if($sinhVien->anhDaiDien)
                <img src="{{ asset('storage/'.$sinhVien->anhDaiDien) }}" alt="Ảnh đại diện" class="mt-2 w-24 h-24 object-cover rounded">
            @endif
        </div>

        <!-- tinh trạng -->
        <div class="mb-4">
            <label for="tinhTrang" class="block text-lg text-[#4B5563] mb-1">Tình trạng</label>
            <div class="relative">
                <select name="tinhTrang" id="tinhTrang" 
                    class="appearance-none w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-green-400">
                    <option value="" disabled>Chọn tình trạng</option>
                    <option value="0" {{ $sinhVien->tinhTrang == 0 ? 'selected' : '' }}>Đang học</option>
                    <option value="1" {{ $sinhVien->tinhTrang == 1 ? 'selected' : '' }}>Đã nghỉ học</option>
                </select>
                <!-- icon mũi tên -->
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 16 16">
                        <path fill="currentColor" d="M13.069 5.157L8.384 9.768a.546.546 0 0 1-.768 0L2.93 5.158a.55.55 0 0 0-.771 0a.53.53 0 0 0 0 .759l4.684 4.61a1.65 1.65 0 0 0 2.312 0l4.684-4.61a.53.53 0 0 0 0-.76a.55.55 0 0 0-.771 0"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Nút submit -->
        <div class="flex space-x-3 pt-4">
            <a href="{{ route('sinhVien.index') }}" onclick="showLoader()"
                class="bg-[#828282] text-white px-4 py-2 rounded hover:bg-[#595959] text-[16px] font-semibold">
                Quay lại
            </a>
            <button type="submit" onclick="showLoader()"
                class="bg-[#10B981] text-white px-4 py-2 rounded hover:bg-[#1D8F6A] text-[16px] font-semibold">
                Cập nhật
            </button>
        </div>
    </form>
</div>
        
@endsection