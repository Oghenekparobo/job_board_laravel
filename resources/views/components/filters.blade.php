<x-card class="mb-6 text-sm shadow-sm rounded-xl p-6 border border-gray-200">
    <form action="{{ route('jobs.index') }}" method="GET">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Search Field -->
            <div>
                <label for="search" class="block text-gray-700 font-medium mb-1">Search</label>
                <x-text-input
                    name="search"
                    id="search"
                    type="text"
                    placeholder="Search jobs..."
                    class="w-full"
                    value="{{ request('search') }}" />
            </div>

            <!-- Salary Fields -->
            <div>
                <label class="block text-gray-700 font-medium mb-1">Salary Range</label>
                <div class="flex gap-4">
                    <x-text-input
                        name="min_salary"
                        id="min_salary"
                        placeholder="From"
                        type="number"
                        class="w-full"
                        value="{{ request('min_salary') }}" />
                    <x-text-input
                        name="max_salary"
                        id="max_salary"
                        placeholder="To"
                        type="number"
                        class="w-full"
                        value="{{ request('max_salary') }}" />
                </div>
            </div>

            <x-radio-group :name="'experience'" :options="\App\Models\Job::$experience" />
            <x-radio-group :name="'category'" :options="\App\Models\Job::$categories" />
        </div>

        <div class="mt-6 text-right">
            <button type="submit" class="cursor-pointer bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2 rounded-md shadow-sm transition-all duration-200">
                Filter
            </button>

          
        </div>
    </form>
</x-card>
