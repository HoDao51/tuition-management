<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hệ thống quản trị</title>
</head>
<body>
    <div class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <div class="w-full">
        @include('admins.layouts.navbar')
    </div>

    <!-- Content area -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200">
            @include('admins.layouts.sidebar')
        </div>

        <!-- Main content -->
        <div class="flex-1 p-4">
            @include('admins.layouts.main')
        </div>
    </div>
</div>
</body>
</html>