<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="mx-auto max-w-7xl px-6 py-8 bg-gray-100">
    <nav class="bg-white shadow-sm rounded-lg p-4 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Home
                </a>
            </div>
            <div class="flex items-center space-x-6">
                @auth
                <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-md text-sm transition-colors">
                        Sign out
                    </button>
                </form>
                @else
                <a href="{{ route('auth.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md text-sm transition-colors">
                    Sign in
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="bg-white shadow-lg rounded-lg p-6 space-y-4">
        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md shadow-md">
            <p class="font-semibold">{{ session('success') }}</p>
        </div>
        @endif
        {{ $slot }}
    </main>

</body>


</html>