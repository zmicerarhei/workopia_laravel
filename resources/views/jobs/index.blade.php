<x-layout>
    <h1> Available jobs </h1>
    <ul>
        @forelse ($jobs as $job)
            <a href="{{ route('jobs.show', $job->id) }}">
                <li> {{ $job->title }} </li>
            </a>
        @empty
            <p>No jobs found</p>
        @endforelse
    </ul>
</x-layout>
