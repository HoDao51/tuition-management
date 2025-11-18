<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hệ thống quản trị</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/sk-telecom-t1-logo-png_seeklogo-362284.png')}}">
</head>
<body class="min-h-screen flex flex-col">
    <div class="sticky top-0 z-50">
        @include('admins.layouts.navbar')
    </div>
    <div class="flex flex-1 w-full">
        <div class="fixed top-16 left-0 w-64 h-screen z-40 hidden md:block">  <!-- Thêm sticky top-0 ở đây -->
            @include('admins.layouts.sidebar')
        </div>
        <main class="flex-1 h-full overflow-auto pl-6 pr-6 pt-2 md:ml-64">
            @yield('content')
        </main>
    </div>
</body>
</html>
