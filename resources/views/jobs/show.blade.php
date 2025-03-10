<x-layout>
    <x-slot name="title">Show Job</x-slot>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Job Details Column -->
        <section class="md:col-span-3">
            <div class="rounded-lg shadow-md bg-white p-3">
                <div class="flex justify-between items-center">
                    <a class="block p-4 text-blue-700" href="{{ route('jobs.index') }}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        Back To Listings
                    </a>

                    @can('update', $job)
                        <div class="flex space-x-3 ml-4">
                            <a href="{{ route('jobs.edit', $job->id) }}"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Edit</a>
                            <!-- Delete Form -->
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                                onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                                    Delete
                                </button>
                            </form>
                            <!-- End Delete Form -->
                        </div>
                    @endcan
                </div>

                <div class="p-4">
                    <h2 class="text-xl font-semibold">
                        {{ $job->title }}
                    </h2>
                    <p class="text-gray-700 text-lg mt-2">
                        {{ $job->description }}
                    </p>
                    <ul class="my-4 bg-gray-100 p-4">
                        <li class="mb-2">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>
                        <li class="mb-2">
                            <strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}
                        </li>
                        <li class="mb-2">
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>
                        <li class="mb-2">
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                        </li>
                        <li class="mb-2">
                            <strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}

                        </li>
                    </ul>
                </div>
            </div>

            <div class="container mx-auto p-4">
                @if ($job->benefits || job->requirements)
                    <h2 class="text-xl font-semibold mb-4">Job Details</h2>
                    <div class="rounded-lg shadow-md bg-white p-4">
                        <h3 class="text-lg font-semibold mb-2 text-blue-500">
                            {{ $job->requirements }}
                        </h3>
                        <p>
                            Bachelors degree in Computer Science or related
                            field, 3+ years of software development
                            experience
                        </p>
                        <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                            {{ $job->benefits }}
                        </h3>
                        <p>
                            Healthcare, 401(k) matching, flexible work hours
                        </p>
                    </div>
                    <p class="my-5">
                        Put "Job Application" as the subject of your email
                        and attach your resume.
                    </p>
                    <a href="mailto:{{ $job->contact_email }}"
                        class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                        Apply Now
                    </a>
            </div>
            @endif

            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <div id="map"></div>
            </div>
        </section>

        <!-- Sidebar -->
        <aside class="bg-white rounded-lg shadow-md p-3">
            <h3 class="text-xl text-center mb-4 font-bold">
                Company Info
            </h3>

            @if ($job->company_logo)
                <img src="/storage/{{ $job->company_logo }}" alt="Ad" class="w-full rounded-lg mb-4 m-auto" />
            @endif

            <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>

            @if ($job->company_description)
                <p class="text-gray-700 text-lg my-3">
                    {{ $job->company_description }}
                </p>
            @endif

            @if ($job->website)
                <a href="{{ $job->company_website }}" target="_blank" class="text-blue-500">Visit Website</a>
            @endif

            <a href="#"
                class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full flex items-center justify-center">
                <i class="fas fa-bookmark mr-3"></i>
                Bookmark Listing
            </a>
        </aside>
    </div>
</x-layout>
