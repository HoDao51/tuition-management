@extends('layouts.app')
@section('content')
  <script src="https://cdn.tailwindcss.com"></script>

  <div class="w-full bg-white inline-flex">
    <!-- Khung ảnh đại diện -->
    <div class="flex flex-col items-center space-y-3 p-4 pt-6">
      <div class="w-60 h-80 bg-gray-300 flex flex-col items-center justify-center space-y-6 border border-[#c5c5c5]">
        @if(Auth::user()->sinhVien->anhDaiDien == null)
            <img src="{{ asset('images/sbcf-default-avatar.png') }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @else
            <img src="{{ asset('storage/'.Auth::user()->sinhVien->anhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="text-center text-[#4B5563] text-[18px]">
        <p class="font-semibold">{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->sinhVien->soDienThoai }}</p>
        <p>{{ Auth::user()->email }}</p>
      </div>
    </div>

    <!-- Thông tin người dùng -->
    <div class="flex-1 pt-3">
      <h2 class="text-[#4B5563] text-[28px] font-semibold">Thông tin cơ bản</h2>
      <table class="table-auto w-2/3 border border-[#D4D4D4] text-[#4B5563]">
        <tbody>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold w-36 border border-[#D4D4D4]">Mã sinh viên:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->ma_sv}}</td>
          </tr>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Giới tính:</td>
            <td class="px-3 py-2"> 
              @if (Auth::user()->sinhVien->gioiTinh == 0)
                Nam
              @else
                Nữ
              @endif
          </td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Ngày sinh:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->ngaySinh}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Khoa:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->lop->khoa->tenKhoa}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Lớp:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->lop->tenLop}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Năm học:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->namHoc->tenNamHoc}}</td>
          </tr>
          
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Địa chỉ:</td>
            <td class="px-3 py-2">{{Auth::user()->sinhVien->diaChi}}</td>
          </tr>

          <tr>
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Tình trạng:</td>
            <td >
              @if (Auth::user()->sinhVien->tinhTrang == 0)
                <span class="px-3 py-2 text-green-600 font-semibold">Đang học</span>
              @else
                <span class="px-3 py-2 text-red-600 font-semibold">Đã nghỉ học</span>
              @endif
          </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
