<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hệ thống quản trị</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo_school2.png')}}">
</head>
<body class="min-h-screen flex flex-col">
    <div id="page-loader" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center z-50">
        <div class="animate-spin rounded-full h-16 w-16 border-8 border-gray-200 border-t-[#ff8e3c]">
        </div>
    </div>
    <div class="sticky top-0 z-50">
        @include('layouts.navbar')
    </div>
    <div class="flex flex-1 w-full">
        <div class="fixed top-16 left-0 h-screen z-40 hidden md:block">  <!-- Thêm sticky top-0 ở đây -->
            @include('layouts.sidebar')
        </div>
        <main class="flex-1 h-full pl-3 overflow-auto pr-6 pt-2 md:ml-60">
            @yield('content')
        </main>
    </div>
    <script>
        function showLoader() {
            document.getElementById("page-loader").classList.remove("hidden");
        }

        window.addEventListener("load", () => {
            document.getElementById("page-loader").classList.add("hidden");
        });
    </script>
</body>
</html>
