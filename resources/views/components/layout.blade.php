<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|inter:300,400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        <div class="mx-auto max-w-7xl w-full px-4 sm:px-6 lg:px-8 py-8">
            <!-- Navigation -->
            <nav class="bg-white rounded-xl shadow-sm mb-8 transition-all duration-300 hover:shadow-md">
                <div class="max-w-7xl mx-auto px-6 py-4">
                    <div class="flex justify-between items-center">
                        <!-- Logo/Home -->
                        <div>
                            <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-lg transition-colors duration-200 flex items-center space-x-2">
                                <!-- Optional: Add an icon here -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span>Home</span>
                            </a>
                        </div>

                        <!-- Right side navigation -->
                        <div class="flex items-center space-x-6">
                            @auth
                            <div class="flex items-center space-x-6">
                                <a href="{{ route('my-job-applications.index') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <span>{{ auth()->user()->name }}'s applications</span>
                                </a>

                                <form action="{{ route('logout') }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Sign out
                                    </button>
                                </form>
                            </div>
                            @else
                            <a href="{{ route('auth.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition-colors duration-200 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Sign in
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="bg-white rounded-xl shadow-md p-6 md:p-8">
                @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-md animate-pulse">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="space-y-6">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-8 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>

</html>