<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App Pegawai')</title>

    @vite('resources/css/app.css')
</head>

<body class="h-screen overflow-hidden">
    <header class="h-screen">
        <div class="flex flex-row w-full h-full">
            @include('component.navbar')
            <div class="flex-1 overflow-y-auto p-5 w-full bg-gray-50 md:px-10 md:py-8">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </header>
</body>

</html>