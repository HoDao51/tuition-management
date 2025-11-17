<script src="https://cdn.tailwindcss.com"></script>
@extends('admins.layouts.app')

@section('content')
  <div class="mx-auto">
    <!-- Thanh tìm kiếm -->
    <div class="">
      <div class="flex items-center space-x-2 mb-4">
        <!-- Ô tìm kiếm có icon bên trong -->
        <div class="relative w-1/3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
              <path fill="currentColor" fill-rule="evenodd" 
                d="M18.319 14.433A8.001 8.001 0 0 0 6.343 3.868a8 8 0 0 0 10.564 11.976l.043.045l4.242 4.243a1 1 0 1 0 1.415-1.415l-4.243-4.242zm-2.076-9.15a6 6 0 1 1-8.485 8.485a6 6 0 0 1 8.485-8.485"
                clip-rule="evenodd"/>
            </svg>
            <input type="text" placeholder="Nhập từ khóa..." class="bg-[#F2F2F2] pl-10 pr-3 py-2 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-gray-300">
        </div>
        <!-- Nút tìm kiếm -->
        <button class="bg-[#D9D9D9] text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400 transition">
            Tìm kiếm
        </button>
    </div>
      <div class="flex items-center space-x-2 mb-1">
        <a href="{{ route('hocKy.create') }}">
            <button type="button" class="bg-[#4B5563] text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                Thêm học kỳ
            </button>
        </a>
      </div>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 text-sm text-left">
        <thead class="bg-[#D9D9D9] text-gray-700 uppercase">
          <tr>
            <th class="px-4 py-2 border w-[150px] text-center">Mã học kỳ</th>
            <th class="px-4 py-2 border text-center">Tên học kỳ</th>
            <th class="px-4 py-2 border text-center">Tên năm học</th>
            <th class="px-4 py-2 border w-[300px] text-center">Hành động</th>
          </tr>
        </thead>
        @foreach ($data as $item)
        <tbody>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->id}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->tenHocKy}}</td>
            <td class="px-4 py-2 border text-[#4B5563] text-[17px] text-center">{{$item->namHoc->tenNamHoc}}</td>
            <td class="px-4 py-2 border text-center pt-5">
                {{-- Nút sửa --}}
                <a href="{{route('hocKy.edit', $item->id)}}">
                    <button type="button"
                        class="bg-[#10B981] text-white text-[18px] font-semibold px-4 py-2 rounded-md hover:bg-[#1D8F6A]">
                        Sửa
                    </button>
                </a>

                {{-- Nút xóa --}}
                <form action="{{route('hocKy.destroy', $item->id)}}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-[#DC2626] text-white text-[18px] font-semibold px-4 py-2 rounded-md hover:bg-red-800 ml-2">
                        Xóa
                    </button>
                </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
  @endsection