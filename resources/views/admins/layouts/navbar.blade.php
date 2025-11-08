<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Header</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <header class="flex items-center justify-between border-b border-[E5E6E6] px-6 py-3">
    
    <!-- Logo + tên -->
    <div class="flex items-center space-x-4 ">
        <span class="font-bold text-4xl mr-3 bg-gradient-to-tr from-blue-400 to-blue-600 bg-clip-text text-transparent">RSCEP</span>
    </div>
    <div class="flex items-center gap-4 grow flex items-center lg:ml-36">
        <span class="hidden lg:block mx-1 lg:text-2xl xl:text-3xl font-semibold text-gray-600 hover:text-blue-950">Tổng quan hệ thống</span>
    </div>

    <div class="relative inline-block text-left">
    <!-- Profile button -->
    <button id="profileBtn" 
      class="flex items-center space-x-4 focus:outline-none" 
      aria-haspopup="true" aria-expanded="false">
      <div>
        <p class="font-semibold text-lg text-gray-900 leading-tight">Trần Đức Hiếu</p>
        <p class="text-gray-600 text-sm">Quản trị viên</p>
      </div>
      <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-500 text-3xl select-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.77 6.879 2.088M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>
    </button>
    <!-- Dropdown -->
    <div id="profileDropdown" 
         class="hidden p-2 absolute bg-white shadow-lg select-none border border-base-200 rounded-lg w-auto min-w-max font-semibold"
         role="menu" aria-orientation="vertical" aria-labelledby="profileBtn"
         >
      <a href="#" class="block px-6 py-3 text-blue-600 hover:bg-gray-100 rounded-lg" role="menuitem">
        Thông tin cá nhân
      </a>
      <hr class="border-gray-200 my-0 mx-2" />
      <a href="#" class="block px-6 py-3 text-gray-600 hover:bg-gray-100 rounded-lg" role="menuitem">
        Đăng xuất
      </a>
    </div>
  </div>
  
  </header>
</body>
@vite('resources/js/profile_dropdown.js')
</html>
