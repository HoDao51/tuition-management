<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('content')
  <div class="mx-auto">
    <!-- Thanh tìm kiếm -->
    <form method="GET" action="{{ route('bienLai.index') }}" class="flex items-center space-x-2 mb-4">
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
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 text-sm text-left">
        <thead class="bg-[#D9D9D9] text-gray-700 uppercase">
          <tr>
            <th class="px-4 py-2 border w-[70px] text-center">Mã SV</th>
            <th class="px-4 py-2 border text-center">Tên sinh viên</th>
            <th class="px-4 py-2 border text-center">Học kỳ</th>
            <th class="px-4 py-2 border text-center">Năm Học</th>
            <th class="px-4 py-2 border text-center">Số tiền đã thu</th>
            <th class="px-4 py-2 border text-center">Ngày thu</th>
            <th class="px-4 py-2 border text-center">Tình Trạng</th>
          </tr>
        </thead>
    @foreach ($data as $item)
        <tbody>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->hocPhi->sinhVien->ma_sv}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->hocPhi->sinhvien->hoTen}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->hocPhi->hocKy->tenHocKy}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->hocPhi->hocKy->namHoc->tenNamHoc}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center text-red-600 font-semibold">{{number_format($item->soTienThu, 0, ',', '.')}}đ</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->ngayThu}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">
               @if ($item->tinhTrang == 0)
                <span class="px-3 py-2 text-green-600 font-semibold">Đã thu</span>
              @else
                <span class="px-3 py-2 text-red-600 font-semibold">Đã hủy</span>
              @endif
            </td>
          </tr>
        </tbody>
  @endforeach
      </table>
    </div>
    <!-- Hiển thị nút phân trang -->
      <div class="flex justify-center space-x-2 mt-4 mb-4">
            @foreach ($data->links()->elements[0] ?? [] as $page => $url)
                @if ($page == $data->currentPage())
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
  </div>
  @endsection