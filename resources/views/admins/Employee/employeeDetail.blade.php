@extends('layouts.app')
@section('content')
  <div class="w-full bg-white inline-flex">
    <!-- Khung ảnh đại diện -->
    <div class="flex flex-col items-center space-y-3  p-4 pt-6">
      <div class="w-60 h-80 bg-gray-300 flex flex-col items-center justify-center space-y-6 border border-[#c5c5c5]">
        @if($nhanVien->anhDaiDien == null)
            <img src="{{ asset('images/sbcf-default-avatar.png') }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @else
            <img src="{{ asset('storage/'.$nhanVien->anhDaiDien) }}" alt="Ảnh đại diện" class="w-full h-full object-cover">
        @endif
      </div>
      <div class="text-center text-[#4B5563] text-[18px]">
        <p class="font-semibold">{{$nhanVien->hoTen}}</p>
        <p>{{$nhanVien->soDienThoai}}</p>
        <p>{{$nhanVien->email}}</p>
      </div>
    </div>

    <!-- Thông tin nhân viên -->
    <div class="flex-1 pt-3">
      <h2 class="text-[#4B5563] text-[28px] font-semibold">Thông tin nhân viên</h2>
      <table class="table-auto w-2/3 border border-[#D4D4D4] text-[#4B5563]">
        <tbody>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold w-36 border border-[#D4D4D4]">Mã nhân viên:</td>
            <td class="px-3 py-2">{{$nhanVien->ma_nv}}</td>
          </tr>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Chức vụ:</td>
            <td class="px-3 py-2 ">
              @if ($nhanVien->chucVu == 0)
                  Quản trị viên
              @else
                  Tài vụ
              @endif
            </td>
          </tr>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Giới tính:</td>
            <td class="px-3 py-2"> 
              @if ($nhanVien->gioiTinh == 0)
                Nam
              @else
                Nữ
              @endif
          </td>
          </tr>
          <tr class="border-b border-[#D4D4D4]">
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Ngày sinh:</td>
            <td class="px-3 py-2">{{$nhanVien->ngaySinh}}</td>
          </tr>
          <tr>
            <td class="px-3 py-2 font-semibold border border-[#D4D4D4]">Tình trạng:</td>
            <td >
              @if ($nhanVien->tinhTrang == 0)
                <span class="px-3 py-2 text-green-600 font-semibold">Đang hoạt động</span>
              @else
                <span class="px-3 py-2 text-red-600 font-semibold">Ngưng hoạt động</span>
              @endif
          </td>
          </tr>
        </tbody>
      </table>

      <!-- Nút chức năng -->
      <div class="mt-5 space-x-2">
        <a href="{{ route('nhanVien.index') }}">
          <button type="button" onclick="showLoader()" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
            Quay lại
          </button>
        </a>

        @if ($nhanVien->tinhTrang == 0)
          <a href="{{route('nhanVien.edit', $nhanVien->id)}}">
            <button type="button" onclick="showLoader()" class="bg-[#10B981] text-white px-4 py-2 rounded hover:bg-[#1D8F6A] transition">
              Chỉnh sửa
            </button>
          </a>
        @else
            <button type="button" class="bg-[#10B981] cursor-not-allowed text-white px-4 py-2 rounded hover:bg-[#1D8F6A] transition">
              Chỉnh sửa
            </button>
        @endif
        
        @if (auth()->user()->id == $nhanVien->user_id)
          <button 
              class="bg-[#DC2626] cursor-not-allowed text-white text-[16px] font-semibold px-3 py-2 rounded-md ml-2 mt-3 mb-3">
              Vô hiệu hóa
          </button>
        @else
            @if ($nhanVien->tinhTrang == 0)
              <form action="{{ route('nhanVien.destroy', $nhanVien->id) }}" method="POST" class="inline-block mt-3">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                      onclick="
                        if (confirm('Bạn có chắc muốn vô hiệu hóa tài khoản này không?')) {
                            showLoader();
                        } else {
                            return false;
                        }"
                      class="bg-[#DC2626] text-white text-[16px] font-semibold px-3 py-2 rounded-md hover:bg-red-800 ml-2">
                      Vô hiệu hóa
                  </button>
              </form>
            @else
              <form action="{{ route('restore', $nhanVien->id) }}" method="POST" class="inline-block mt-3">
                  @csrf
                  @method('POST')
                  <button type="submit"
                      onclick="
                        if (confirm('Bạn có chắc muốn khôi phục tài khoản này không?')) {
                            showLoader();
                        } else {
                            return false;
                        }"
                      class="bg-[#F97316] text-white text-[16px] font-semibold px-[18px] py-2 rounded-md hover:bg-[#C55E17]">
                      Kích hoạt
                  </button>
              </form>
            @endif
          @endif
      </div>
    </div>
  </div>
@endsection