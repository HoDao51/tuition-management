<!doctype html>
<html lang="en" data-theme="light" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.js"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-white">
  <div class="w-full sm:max-w-xl px-6">
    <div class="text-center">
      <h2 class="bg-gradient-to-r from-blue-400 to-blue-700 bg-clip-text text-transparent uppercase text-3xl font-bold">
        Cao đẳng điện lực hoàng gia Scambodia
      </h2>
    </div>

    <div class="mt-10">
      <form action="{{route('postLogin')}}" method="POST" class="grid grid-flow-row auto-rows-min gap-3 space-y-4 border bg-white rounded-2xl border-gray-200 shadow-xl p-6">
      @csrf
        <h2 class="text-2xl font-semibold text-[#1f2937]">Đăng nhập</h2>

        <!-- Email -->
        <div>
          <label for="email" class="pt-0 label label-text font-semibold text-[#1f2937]">
            <span>Email</span>
          </label>
          <div class="flex-1 relative border border-gray-200 rounded-md">
            <input id="email" placeholder="Địa chỉ email"
                   class="input input-bordered w-full peer pl-10 pt-3 pb-3"
                   type="email" name="email"/>
            <svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
            </svg>
          </div>
            @error('email')
              <p class="text-red-500">{{ $message}}</p>
            @enderror
        </div>

        <!-- Mật khẩu -->
        <div>
          <label for="password" class="pt-0 label label-text font-semibold text-[#1f2937]">
            <span>Mật khẩu</span>
          </label>
          <div class="flex-1 relative border border-gray-200 rounded-md">
            <input id="password" placeholder="Mật khẩu"
                   class="input input-bordered w-full peer pl-10 pt-3 pb-3"
                   type="password" name="password"/>
            <svg class="inline w-5 h-5 absolute top-1/2 -translate-y-1/2 left-3 text-gray-400 pointer-events-none"
                 xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>
          </div>
            @error('password')
              <p class="text-red-500">{{ $message}}</p>
            @enderror
        </div>

        <!-- Nút đăng nhập -->
        <button type="submit" class="p-3 w-full text-xl bg-[#f2f2f2] hover:bg-[#d2d2d2] text-[#1f2937] font-semibold rounded-lg">
          Đăng nhập
        </button>
      </form>
    </div>
  </div>
</body>
</html>
