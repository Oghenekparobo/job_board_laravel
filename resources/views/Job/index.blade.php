<x-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-center mb-8">Job Listings</h1>

        <x-filters />


        @foreach ($jobs as $job)
        <x-job-card :job="$job" />
        @endforeach
    </div>
</x-layout>