<x-layout>
    <x-breadcrumbs
        :$job
        class="my-10"
        :links="['Home'=> '/jobs', 'Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job->id)]"
        :active="$job->title" />

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-center mb-8">Job Details</h1>

        <x-job-card :$job />

        <section class="mt-12">
            <x-card class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                    More Jobs at {{ $job->employer->company_name }}
                </h2>

                @if($job->employer->jobs->where('id', '!=', $job->id)->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($job->employer->jobs as $otherJob)
                    @if($otherJob->id !== $job->id)
                    <div class="bg-white border rounded-lg shadow-sm hover:shadow-md transition-shadow p-4">
                        <h3 class="font-semibold text-lg text-blue-600 mb-2">
                            {{ $otherJob->title }}
                        </h3>
                        <div class="text-sm text-gray-600 mb-3 line-clamp-2">
                            {{ Str::limit($otherJob->description, 100) }}
                        </div>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $otherJob->location }}
                            <span class="mx-2">•</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            ${{ number_format($otherJob->salary) }}
                        </div>
                        <a href="{{ route('jobs.show', $otherJob->id) }}" class="inline-block w-full text-center text-blue-600 hover:text-blue-800 border border-blue-600 hover:border-blue-800 font-medium py-2 px-4 rounded-md transition-colors duration-200">
                            View Details
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <p class="text-gray-600">No other jobs available from this employer at the moment.</p>
                </div>
                @endif
            </x-card>

            <div class="flex justify-center mt-8">
                <a href="{{ route('jobs.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-6 rounded-md transition-colors duration-200">
                    Back to All Jobs
                </a>
            </div>
        </section>
    </div>
</x-layout>