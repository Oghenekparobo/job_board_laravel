<x-layout>
    <div class="max-w-md mx-auto my-16 px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Sign In to Your Account</h1>

        <x-card class="p-6 shadow-lg">
            <form action="{{ route('auth.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <x-text-input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full"
                        required
                        autofocus
                        value="{{ old('email') }}" />
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="{{ route('jobs.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Forgot password?
                        </a>
                    </div>
                    <x-text-input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full"
                        required />
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-md shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Sign In
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('jobs.index') }}" class="font-medium text-blue-600 hover:text-blue-800">
                        Create one now
                    </a>
                </p>
            </div>
        </x-card>
    </div>
</x-layout>