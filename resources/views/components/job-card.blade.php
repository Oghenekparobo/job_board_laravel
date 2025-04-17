@props(['job'])

<div class="bg-white shadow-md rounded-lg overflow-hidden mb-6 border border-gray-100 hover:shadow-xl transition-all duration-300">
    <!-- Job Header with Company Logo Space -->
    <div class="bg-blue-50 p-6 border-b border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800">{{ $job->title }}</h2>
        <p class="text-sm text-blue-600 font-medium">{{ $job->employer->company_name }}</p>
    </div>

    <!-- Job Details -->
    <div class="p-6">
        <p class="text-gray-700 mb-6">{{ $job->description }}</p>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <!-- Location -->
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>{{ $job->location }}</span>
            </div>

            <!-- Salary -->
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>${{ $job->salary }}</span>
            </div>

            <!-- Experience -->
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>{{ $job->experience }}</span>
            </div>

            <!-- Category -->
            <div class="flex items-center text-sm text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <span>{{ $job->category }}</span>
            </div>
        </div>

        <!-- Action Buttons Based on Route -->
        <div class="flex gap-4 mt-6">
            @if(request()->route()->getName() === 'jobs.index' || request()->path() === '/')
            <!-- On index/home page, show View Details button -->
            <a href="{{ route('jobs.show', $job->id) }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-5 rounded text-center transition-colors duration-200">
                View Details
            </a>
            @else
            <!-- On job detail page, show Back to Home button -->
            <a href="{{ route('jobs.index') }}" class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-medium py-3 px-5 rounded text-center transition-colors duration-200">
                Back to Jobs
            </a>
            @endif
        </div>

        @can('apply', $job)
   
          <div class="mt-6">
            <a href="{{ route('job.application.create', $job) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-5 rounded text-center transition-colors duration-200">
                Apply Now
            </a>
        </div>
        @else
        <div class="mt-6">
            <a class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-5 rounded text-center transition-colors duration-200">
             Already apllied
            </a>
        </div>
        @endcan

      
    </div>
</div>