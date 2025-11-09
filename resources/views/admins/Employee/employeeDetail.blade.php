@extends('admins.layouts.app')
@section('content')
  <script src="https://cdn.tailwindcss.com"></script>

  <div class="w-full bg-white inline-flex">
    <!-- Khung ảnh đại diện -->
    <div class="flex flex-col items-center space-y-3  p-4">
      <div class="w-50 h-60 bg-gray-300 rounded-lg flex flex-col items-center justify-center space-y-6">
        @if($nhanVien->anhDaiDien)
                <img src="{{ asset('storage/'.$nhanVien->anhDaiDien) }}" alt="Ảnh đại diện" class="mt-2 w-50 h-36 object-cover rounded">
        @endif
      </div>
      <div class="text-center text-gray-700 text-sm">
        <p class="font-semibold">Trần Đức Hiếu</p>
        <p>0123456789</p>
        <p>hieu123@gmail.com</p>
      </div>
    </div>

    <!-- Thông tin nhân viên -->
    <div class="flex-1">
      <h2 class="text-gray-700 text-xl font-semibold mb-4">Thông tin nhân viên</h2>
      <table class="table-auto w-2/3 border border-gray-200 text-gray-700">
        <tbody>
          <tr class="border-b border-gray-200">
            <td class="px-3 py-2 font-semibold w-36 border border-gray-200">Mã nhân viên:</td>
            <td class="px-3 py-2">{{$nhanVien->ma_nv}}</td>
          </tr>
          <tr class="border-b border-gray-200">
            <td class="px-3 py-2 font-semibold border border-gray-200">Chức vụ:</td>
            <td class="px-3 py-2 ">
                @if ($nhanVien->ma_nv == 0)
                    Quản trị viên
                @else
                    Tài vụ
                @endif
            </td>
          </tr>
          <tr class="border-b border-gray-200">
            <td class="px-3 py-2 font-semibold border border-gray-200">Giới tính:</td>
            <td class="px-3 py-2"></td>
          </tr>
          <tr class="border-b border-gray-200">
            <td class="px-3 py-2 font-semibold border border-gray-200">Ngày sinh:</td>
            <td class="px-3 py-2"></td>
          </tr>
          <tr>
            <td class="px-3 py-2 font-semibold border border-gray-200">Tình trạng:</td>
            <td class="px-3 py-2 text-green-600">Đang hoạt động</td>
          </tr>
        </tbody>
      </table>

      <!-- Nút chức năng -->
      <div class="mt-5 space-x-3">
        <button class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
          Quay lại
        </button>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
          Chỉnh sửa
        </button>
      </div>
    </div>
  </div>
@endsection