@extends('layouts.app')
@section('content')
  <div class="w-full bg-white inline-flex">
    <!-- Khung ảnh đại diện -->
    <div class="flex flex-col items-center space-y-3  p-4 pt-6">
      <div class="w-60 h-80 bg-gray-300 flex flex-col items-center justify-center space-y-6 border border-[#c5c5c5]">
        @if($sinhVien->anhDaiDien == null)
            <img src="{{ asset('images/sbcf-default-avatar.png') }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @else
            <img src="{{ asset('storage/'.$sinhVien->anhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="text-center text-[#4B5563] text-[18px]">
        <p class="font-semibold">{{$sinhVien->hoTen}}</p>
        <p>{{$sinhVien->soDienThoai}}</p>
        <p>{{$sinhVien->email}}</p>
      </div>
    </div>

    <!-- Thông tin nhân viên -->
    <div class="flex-1 pt-3">
      <h2 class="text-[#4B5563] text-[28px] font-semibold">Thông tin sinh viên</h2>
      <table class="table-auto w-2/3 border border-[#D4D4D4] text-[#4B5563]">
        <tbody>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold w-36 border border-[#D4D4D4]">Mã sinh viên:</td>
            <td class="px-3 py-2">{{$sinhVien->ma_sv}}</td>
          </tr>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Giới tính:</td>
            <td class="px-3 py-2"> 
              @if ($sinhVien->gioiTinh == 0)
                Nam
              @else
                Nữ
              @endif
          </td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Ngày sinh:</td>
            <td class="px-3 py-2">{{$sinhVien->ngaySinh}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Khoa:</td>
            <td class="px-3 py-2">{{$sinhVien->lop->khoa->tenKhoa}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Lớp:</td>
            <td class="px-3 py-2">{{$sinhVien->lop->tenLop}}</td>
          </tr>

          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Năm học:</td>
            <td class="px-3 py-2">{{$sinhVien->namHoc->tenNamHoc}}</td>
          </tr>
          
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Địa chỉ:</td>
            <td class="px-3 py-2">{{$sinhVien->diaChi}}</td>
          </tr>

          <tr>
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Tình trạng:</td>
            <td >
              @if ($sinhVien->tinhTrang == 0)
                <span class="px-3 py-2 text-green-600 font-semibold">Đang học</span>
              @else
                <span class="px-3 py-2 text-red-600 font-semibold">Đã nghỉ học</span>
              @endif
          </td>
          </tr>
        </tbody>
      </table>

      <!-- Nút chức năng -->
      <div class="mt-5 space-x-3">
        <a href="{{ route('sinhVien.index') }}">
          <button type="button" onclick="showLoader()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
            Quay lại
          </button>
        </a>

        @if (auth()->user()->role == 0)
          <a href="{{route('sinhVien.edit', $sinhVien->id)}}">
            <button type="button" onclick="showLoader()" class="bg-[#10B981] text-white px-4 py-2 rounded hover:bg-[#1D8F6A] transition">
              Chỉnh sửa
            </button>
          </a>
        @endif

        <a href="{{ route('hocPhi.create') }}?sinhVien={{ $sinhVien->id }}">
          <button type="button" onclick="showLoader()" class="bg-[#F97316] text-white px-4 py-2 rounded hover:bg-[#C55E17] transition">
            Thêm học phí
          </button>
        </a>
      </div>
    </div>
  </div>
@endsection