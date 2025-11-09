<body class="min-h-screen flex flex-col">
    <div class="">
        @include('admins.layouts.navbar')
    </div>
    <div class="flex flex-1 w-full">
        <div class="h-full">
            @include('admins.layouts.sidebar')
        </div>
        <main class="flex-1 h-full overflow-auto pl-6 pr-6 pt-2">
            @yield('content')
        </main>
    </div>
</body>