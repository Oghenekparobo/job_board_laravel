<x-layout>
    <form action="{{ route('employer.store') }}" method="POST" class="space-y-6">
        @csrf
        <h1 class="text-2xl font-bold text-center">Create Employer</h1>

        <!-- Employer Name Input -->
        <div class="space-y-2">
            <label for="company_name" class="block text-lg font-medium text-gray-700">Employer Name</label>
            <x-text-input
                name="company_name"
                id="company_name"
                placeholder="Enter employer name"
                type="text"
                class="w-full p-3 border border-gray-300 rounded-md"
                value="{{ old('company_name') }}" />

            <!-- Display validation errors for company_name -->
            @error('company_name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Employer
            </button>
        </div>
    </form>
</x-layout>