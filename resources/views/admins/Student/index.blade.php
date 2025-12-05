@extends('layouts.app')
@section('content')
  <div class="mx-auto">
    <div class="flex justify-between">
      <form method="GET" action="{{ route('sinhVien.index') }}" class="flex items-center space-x-2 mb-4">
        <!-- Thanh tìm kiếm -->
        <div class="relative w-[400px]">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
            <path fill="currentColor" fill-rule="evenodd" d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485" clip-rule="evenodd"/>
          </svg>
          <input type="text" name="search" value="{{ $search }}" placeholder="Nhập từ khóa..." class="bg-[#F2F2F2] pl-10 pr-3 py-2 rounded w-full focus:outline-none focus:ring-1 focus:ring-gray-300">
        </div>
        <!-- Nút tìm kiếm -->
        <button type="submit" class="bg-[#D9D9D9] text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">
            Tìm kiếm
        </button>
      </form>
      <div class="flex items-center space-x-2 mb-1">
        @if (auth()->user()->role == 0)
          <a href="{{ route('sinhVien.create') }}">
            <button type="button" onclick="showLoader()" class="bg-[#4B5563] text-white flex px-6 py-2 font-semibold rounded hover:bg-gray-700 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1" fill="#222C3A" viewBox="0 0 32 32">
                <path fill="currentColor" d="M16 3C8.832 3 3 8.832 3 16s5.832 13 13 13s13-5.832 13-13S23.168 3 16 3m0 2c6.087 0 11 4.913 11 11s-4.913 11-11 11S5 22.087 5 16S9.913 5 16 5m-1 5v5h-5v2h5v5h2v-5h5v-2h-5v-5z"/>
              </svg>  
              Thêm sinh viên
            </button>
          </a>
        @endif
      </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 text-sm text-left">
        <thead class="bg-[#D9D9D9] text-gray-700 uppercase">
          <tr>
            <th class="px-4 py-2 border text-center w-[70px]">Mã SV</th>
            <th class="px-4 py-2 border text-center">Họ tên</th>
            <th class="px-4 py-2 border text-center">Ngày sinh</th>
            <th class="px-4 py-2 border text-center">Lớp</th>
            <th class="px-4 py-2 border text-center">Xem chi tiết</th>
            <th class="px-4 py-2 border text-center">Tình trạng</th>
            <th class="px-4 py-2 border text-center w-[250px]">Hành động</th>
          </tr>
        </thead>
        @forelse ($data as $item)
        <tbody>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->ma_sv}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] pl-6">{{$item->hoTen}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->ngaySinh}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->lop->tenLop}}</td>
            <td class="px-4 py-2 border text-center">
              <a href="{{route('sinhVien.show', $item->id)}}">
                <button type="button" onclick="showLoader()" class="bg-blue-600 text-white text-[16px] font-semibold px-3 py-2 rounded hover:bg-blue-700">Xem thêm</button>
              </a>
            </td>
            <td class="px-4 py-2 border text-[17px] text-center">
              @if ($item->tinhTrang == 0)
                <span class="px-2 text-blue-500 border border-blue-500 rounded-full font-semibold">Đang học</span>
              @else
                <span class="px-2 text-red-600 border border-red-400 rounded-full font-semibold">Đã nghỉ học</span>
              @endif
            </td>
            <td class="px-2 py-2 border text-center ">
              @if (auth()->user()->role == 0)
                <a href="{{route('sinhVien.edit', $item->id)}}">
                    <button type="button" onclick="showLoader()" 
                      class="bg-[#10B981] text-white text-[16px] font-semibold px-3 py-2 rounded hover:bg-[#1D8F6A]">
                      Sửa
                    </button>
                </a>
              @endif

                <a href="{{ route('hocPhi.create') }}?sinhVien={{ $item->id }}">
                  <button type="button" onclick="showLoader()" class="bg-[#F97316] text-white text-[16px] font-semibold px-3 py-2 rounded hover:bg-[#C55E17] ml-2">
                    Thêm học phí
                  </button>
                </a>
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

    @if ($data->hasPages())
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
    @endif
  </div>
  @endsection