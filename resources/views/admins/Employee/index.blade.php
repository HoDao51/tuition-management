<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('content')
  <div class="mx-auto">
    <!-- Thanh tìm kiếm -->
    <div class="">
      <form method="GET" action="{{ route('nhanVien.index') }}" class="flex items-center space-x-2 mb-4">
        <!-- Ô tìm kiếm có icon bên trong -->
        <div class="relative w-1/3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
              <path fill="currentColor" fill-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485" clip-rule="evenodd"/>
            </svg>
            <input type="text" name="search" value="{{ $search }}" placeholder="Nhập từ khóa..." class="bg-[#F2F2F2] pl-10 pr-3 py-2 rounded-md w-full focus:outline-none focus:ring-1 focus:ring-gray-300">
        </div>
        <!-- Nút tìm kiếm -->
        <button type="submit" class="bg-[#D9D9D9] text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
            Tìm kiếm
        </button>
      </form>
      <div class="flex items-center space-x-2 mb-1">
        <a href="{{ route('nhanVien.create') }}">
            <button type="button" onclick="showLoader()" class="bg-[#4B5563] text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                Thêm nhân viên
            </button>
        </a>
      </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 text-sm text-left">
        <thead class="bg-[#D9D9D9] text-gray-700 uppercase">
          <tr>
            <th class="px-4 py-2 border text-center w-[70px]">Mã NV</th>
            <th class="px-4 py-2 border text-center">Họ tên</th>
            <th class="px-4 py-2 border text-center">Ngày sinh</th>
            <th class="px-4 py-2 border text-center">Chức vụ</th>
            <th class="px-4 py-2 border text-center">Xem chi tiết</th>
            <th class="px-4 py-2 border text-center">Tình trạng</th>
            <th class="px-4 py-2 border text-center w-[200px]">Hành động</th>
          </tr>
        </thead>
        @forelse($nhanVien as $item)
        <tbody>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{($item->ma_nv)}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] pl-6">{{($item->hoTen)}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{($item->ngaySinh)}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">
                @if(($item->chucVu) == 0)
                    Quản trị viên
                @else
                    Tài vụ
                @endif
            </td>
            <td class="px-4 py-2 border text-center">
              <a href="{{ route('nhanVien.show', $item->id) }}">
                <button type="button" onclick="showLoader()" class="bg-blue-600 text-white text-[16px] font-semibold px-3 py-2 rounded-md hover:bg-blue-700">
                  Xem thêm
                </button>
              </a>
            </td>
            <td class="px-4 py-2 border text-[17px]">
                @if(($item->tinhTrang) == 0)
                <div class="text-green-600 font-medium text-center">
                    Đang hoạt động
                </div>
                @else
                <div class="text-red-600 font-medium text-center">
                    Ngưng hoạt động
                </div>
                @endif
            </td>
            <td class="px-2 py-2 border text-center">
              @if ($item->tinhTrang == 0)
                <a href="{{ route('nhanVien.edit', $item->id) }}">
                  <button type="button" onclick="showLoader()" class="bg-[#10B981] text-white text-[16px] font-semibold px-3 py-2 rounded-md hover:bg-[#1D8F6A]">
                    Sửa
                  </button>
                </a>
              @else
                <button type="button"class="bg-[#10B981] cursor-not-allowed text-white text-[16px] font-semibold px-3 py-2 rounded-md hover:bg-[#1D8F6A]">
                  Sửa
                </button>
              @endif

                @if (auth()->user()->id == $item->user_id)
                    <button 
                        class="bg-[#DC2626] cursor-not-allowed text-white text-[16px] font-semibold px-3 py-2 rounded-md ml-2 mt-3 mb-3">
                        Khóa
                    </button>
                @else
                  @if ($item->tinhTrang == 0)
                    <form action="{{ route('nhanVien.destroy', $item->id) }}" method="POST" class="inline-block mt-3">
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
                            Khóa
                        </button>
                    </form>
                  @else
                    <form action="{{ route('restore', $item->id) }}" method="POST" class="inline-block mt-3">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            onclick="
                                if (confirm('Bạn có chắc muốn khôi phục tài khoản này không?')) {
                                    showLoader();
                                } else {
                                    return false;
                                }"
                            class="bg-[#F97316] text-white text-[16px] font-semibold px-[18px] py-2 rounded-md hover:bg-[#C55E17] ml-2">
                            Mở
                        </button>
                    </form>
                  @endif
                @endif
            </td>
          </tr>
          @empty
            <tr>
                <td colspan="8" class="px-2 py-4 border text-center text-gray-600 text-[17px]">
                    Không có dữ liệu
                </td>
            </tr>
        </tbody>
        @endforelse
      </table>
    </div>
    @if ($nhanVien->hasPages())
    <!-- Hiển thị nút phân trang -->
      <div class="flex justify-center space-x-2 mt-4 mb-4">
            @foreach ($nhanVien->links()->elements[0] ?? [] as $page => $url)
                @if ($page == $nhanVien->currentPage())
                    <span class="px-4 py-2 bg-blue-600 text-white rounded-[5px]">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}" 
                      class="px-4 py-2 bg-gray-200 text-gray-700 rounded-[5px] hover:bg-blue-500 hover:text-white transition">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
      </div>
    @endif
  </div>
  @endsection