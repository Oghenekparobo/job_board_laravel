<x-layout>
    <x-breadcrumbs :links="['My Job Applications' => '#']" />

    <div class="container mx-auto mt-12 pb-12">
        <h1 class="text-4xl font-bold text-center mb-12 text-indigo-700">My Job Journey</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($applications as $application)
            <div class="job-application-card bg-gradient-to-br from-indigo-50 to-white p-6 border-2 border-indigo-300 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105">
                <!-- Job Card with colorful header -->
                <div class="mb-6 pb-4 border-b-2 border-indigo-200">
                    <x-job-card :job="$application->job" />
                </div>

                <!-- Application Details -->
                <div class="application-info space-y-6">
                    <!-- Applied Date with Icon -->
                    <div class="flex items-center text-sm text-indigo-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Applied {{ $application->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Salary and Applicants Information -->
                    <div class="space-y-4">
                        <!-- Expected Salary -->
                        <div class="bg-green-100 p-4 rounded-lg flex justify-between items-center">
                            <span class="font-semibold text-green-800">Your Asking Salary:</span>
                            <span class="text-green-700 font-bold text-xl">${{ number_format($application->expected_salary) }}</span>
                        </div>

                        <!-- Average Salary -->
                        <div class="bg-blue-100 p-4 rounded-lg flex justify-between items-center">
                            <span class="font-semibold text-blue-800">Average Asking Salary:</span>
                            <span class="text-blue-700 font-bold text-xl">${{ number_format($application->job->job_applications_avg_expected_salary) }}</span>
                        </div>

                        <!-- Other Applicants -->
                        <div class="bg-purple-100 p-4 rounded-lg flex justify-between items-center">
                            <span class="font-semibold text-purple-800">Other Applicants:</span>
                            <span class="text-purple-700 font-bold text-xl">
                                {{ $application->job->job_applications_count - 1 }}
                                {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                            </span>
                        </div>
                    </div>



                    <!-- Cancel Application Button -->
                    <div class="mt-6 text-center">
                        <form action="{{ route('my-job-applications.destroy', $application) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300 ease-in-out">
                                Cancel Application
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>