<body>
  <header class="flex items-center justify-between border-b border-[E5E6E6] px-6 py-3 bg-white">
    
    <!-- Logo + tên -->
    <a @if(auth()->user()->role == 0 || auth()->user()->role == 1)
        href="{{route('admins.index')}}"
      @else
        href="{{route('thongTinHocPhi.index')}}"
      @endif
    >
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/logo_school2.png')}}" class="w-[36px] h-[36px] object-contain">
        <span class="font-bold text-4xl leading-none bg-gradient-to-tr from-yellow-400 to-red-600 bg-clip-text text-transparent">
            RSCEP
        </span>
      </div>
    </a>
    <div class="flex items-center gap-4 grow flex items-center lg:ml-[75px]">
      @if (Route::currentRouteName() == 'admins.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Tổng quan hệ thống
        </span>

      <!-- tiêu đề nhân viên -->
      @elseif (Route::currentRouteName() == 'nhanVien.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý nhân viên
        </span>
      @elseif (Route::currentRouteName() == 'nhanVien.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm nhân viên
        </span>
      @elseif (Route::currentRouteName() == 'nhanVien.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin nhân viên
        </span>
      @elseif (Route::currentRouteName() == 'nhanVien.show')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý nhân viên
        </span>

      <!-- tiêu đề sinh viên -->
      @elseif (Route::currentRouteName() == 'sinhVien.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý sinh viên
        </span>
      @elseif (Route::currentRouteName() == 'sinhVien.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm nhân sinh viên
        </span>
      @elseif (Route::currentRouteName() == 'sinhVien.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin sinh viên
        </span>
      @elseif (Route::currentRouteName() == 'sinhVien.show')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý sinh viên
        </span>

      <!-- tiêu đề khoa -->
      @elseif (Route::currentRouteName() == 'khoa.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý khoa
        </span>
      @elseif (Route::currentRouteName() == 'khoa.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm khoa
        </span>
      @elseif (Route::currentRouteName() == 'khoa.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin khoa
        </span>
        
      <!-- tiêu đề lớp -->
      @elseif (Route::currentRouteName() == 'lop.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý lớp học
        </span>
      @elseif (Route::currentRouteName() == 'lop.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm lớp học
        </span>
      @elseif (Route::currentRouteName() == 'lop.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin lớp học
        </span>

      <!-- tiêu đề năm học -->
      @elseif (Route::currentRouteName() == 'namHoc.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý năm học
        </span>
      @elseif (Route::currentRouteName() == 'namHoc.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm năm học
        </span>
      @elseif (Route::currentRouteName() == 'namHoc.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin năm học
        </span>

      <!-- tiêu đề học kỳ -->
      @elseif (Route::currentRouteName() == 'hocKy.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý học kỳ
        </span>
      @elseif (Route::currentRouteName() == 'hocKy.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm học kỳ
        </span>
      @elseif (Route::currentRouteName() == 'hocKy.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin học kỳ
        </span>


      <!-- tiêu đề học phí -->
      @elseif (Route::currentRouteName() == 'hocPhi.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý học phí
        </span>
      @elseif (Route::currentRouteName() == 'hocPhi.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm học phí
        </span>
      @elseif (Route::currentRouteName() == 'hocPhi.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin học phí
        </span>

      <!-- tiêu đề biên lai -->
      @elseif (Route::currentRouteName() == 'bienLai.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Quản lý biên lai
        </span>
      @elseif (Route::currentRouteName() == 'bienLai.create')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thêm biên lai
        </span>
      @elseif (Route::currentRouteName() == 'bienLai.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin biên lai
        </span>

      <!-- tiêu đề thông tin cá nhân -->
      @elseif (Route::currentRouteName() == 'thongTinCaNhan.index' || Route::currentRouteName() == 'students.thongTinCaNhan.index')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thông tin người dùng
        </span>
      @elseif (Route::currentRouteName() == 'thongTinCaNhan.edit')
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Chỉnh sửa thông tin người dùng
        </span>

      @elseif (Route::currentRouteName() == 'thongTinHocPhi.index' && auth()->user()->role == 2)
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thông tin học phí
        </span>
      @elseif (Route::currentRouteName() == 'thongTinBienLai.index' && auth()->user()->role == 2)
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">
          Thông tin biên lai
        </span>
      @endif

    </div>

    @auth
    <div class="relative inline-block text-left ">
      <!-- Profile button -->
      <button id="profileBtn" class="flex items-center space-x-2" aria-haspopup="true" aria-expanded="false">
        <div>
          <p class="font-semibold text-lg text-gray-700 leading-tight">{{ auth()->user()->name }}</p>
          <p class="text-gray-600 text-sm">
            @if (auth()->user()->role == 0)
              Quản trị viên
            @elseif (auth()->user()->role == 1)
              Tài vụ
            @else
              Sinh viên
            @endif 
          </p>
        </div>
        @php
        $user = auth()->user();
        $avatar = asset('images/sbcf-default-avatar.png');

        if ($user) {
            if ($user->nhanVien && $user->nhanVien->anhDaiDien) {
                $avatar = asset('storage/' . $user->nhanVien->anhDaiDien);
            } elseif ($user->sinhVien && $user->sinhVien->anhDaiDien) {
                $avatar = asset('storage/' . $user->sinhVien->anhDaiDien);
            }
        }
        @endphp
      
        <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-gray-300">
            <img src="{{ $avatar }}" alt="Avatar" class="w-full h-full object-cover">
        </div>
      </button>
      <!-- Dropdown -->
      <div id="profileDropdown" 
          class="hidden absolute bg-white shadow-lg select-none border border-base-200 rounded-lg w-auto min-w-max font-semibold right-0 top-12 p-2"
          role="menu" aria-orientation="vertical" aria-labelledby="profileBtn"
          >
        @if (auth()->user()->role == 0 || auth()->user()->role == 1)
          <a href="{{route('thongTinCaNhan.index')}}" class="block px-6 py-2 text-blue-600 hover:bg-gray-100 rounded-lg mb-2" role="menuitem">
            Thông tin cá nhân
          </a>
        @else
          <a href="{{route('students.thongTinCaNhan.index')}}" class="block px-6 py-2 text-blue-600 hover:bg-gray-100 rounded-lg" role="menuitem">
            Thông tin cá nhân
          </a>
        @endif
        
        <hr class="border-gray-200 my-0 mx-2">
        <a href="{{route('logout')}}" class="block px-6 py-2 text-gray-600 hover:bg-gray-100 rounded-lg mt-2" role="menuitem">
          Đăng xuất
        </a>
      </div>
    </div>
    @endauth
</header>
<!-- script menu lựa chọn -->
@vite('resources/js/profile_dropdown.js')
</body>
