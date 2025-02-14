<x-layout>
    <x-slot name="title">Home</x-slot>
    <h1 class="text-center text-3xl font-bold mb-4 border border-gray-300 p-3">Welcome to Workopia</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>No jobs found</p>
        @endforelse
    </div>
    <a href="{{ route('jobs.index') }}" class="block text-xl text-center"><i class="fa fa-arrow-alt-circle-right"></i> Show
        all jobs</a>
    <x-bottom-banner />
</x-layout>
