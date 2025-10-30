@php
    $currentRoute = Route::currentRouteName();

    $prefix = explode('.', $currentRoute)[0] ?? 'home';

    $indexRoute = $prefix . '.index';
@endphp

<a href="{{ route($indexRoute) }}"
    class="fixed top-6 right-8 bg-blue-700 hover:bg-blue-600 text-white font-semibold px-4 py-3 rounded-2xl shadow-lg flex items-center gap-2 z-10">

    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
    </svg>
</a>