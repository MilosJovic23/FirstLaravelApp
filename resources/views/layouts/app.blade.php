


<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11 Task list App</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

        {{-- blade-formater-disable  --}}
        <style type="text/tailwindcss">
            .btn{
                @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 text-slate-700 ring-slate-700/10 hover:bg-slate-50
            }
            .link{
                @apply font-medium text-gray-700 underline decoration-pink-500
            }
        </style>
        {{-- blade-formater-enable  --}}
        @yield('styles')
    </head>

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="mb-4 text-2xl">@yield('title')</h1>
        <div>
            @if(session()->has('success'))
            <div>{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </body>

</html>
