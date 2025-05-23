<x-layout>
    <x-card>
        <x-breadcrumbs
            :$job
            class="my-10"
            :links="[
                'Home' => '/jobs', 
                'Jobs' => route('jobs.index'),
                $job->title => route('jobs.show', $job->id),
                'Apply' => '#'
            ]"
            :active="$job->title" />

        <x-job-card :job="$job" />
        <x-card>
            <form action="{{ route('job.application.store', $job) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <h1 class="text-2xl font-bold">Your Application</h1>

                <!-- Expected Salary Field -->
                <div class="space-y-2">
                    <label for="expected_salary" class="block text-lg font-medium text-gray-700">Expected Salary</label>
                    <x-text-input
                        name="expected_salary"
                        id="expected_salary"
                        placeholder="Enter your expected salary"
                        type="number"
                        class="w-full p-3 border border-gray-300 rounded-md"
                        value="{{ old('expected_salary') }}" />

                    <!-- Display validation errors for expected_salary -->
                    @error('expected_salary')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CV Upload Field -->
                <div>
                    <label for="cv" class="block text-lg font-medium text-gray-700">Upload CV</label>
                    <x-text-input
                        name="cv"
                        id="cv"
                        type="file"
                        class="w-full p-3 border border-gray-300 rounded-md"
                        accept=".pdf,.doc,.docx" />

                    <!-- Display validation errors for cv -->
                    @error('cv')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Apply
                    </button>
                </div>
            </form>
        </x-card>

    </x-card>
</x-layout>