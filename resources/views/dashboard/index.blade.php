<x-layout>
    <section class="flex flex-col md:flex-row gap-4">
        <!-- Profile -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                Profile info
            </h3>

            @if ($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="username"
                        class="w-32 h-32 object-cover rounded-full">
                </div>
            @endif
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-inputs.text id="name" label="Name" name="name" value="{{ $user->name }}" />
                <x-inputs.text id="email" label="Email" name="email" type="email"
                    value="{{ $user->email }}" />
                <x-inputs.file id="avatar" label="Upload avatar" name="avatar" />

                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 border rounded focus:outline-none">
                    Submit
                </button>
            </form>

        </div>
        <!-- Job listings -->
        <div class="bg-white p-8 rounded-lg shadow-md w-full">
            <h3 class="text-3xl text-center font-bold mb-4">
                My job listings
            </h3>

            @forelse ($jobs as $job)
                <div class="flex justify-between items-center border-b-2 border-gray-200 py-2">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                        <p class="text-gray-700">{{ $job->job_type }}</p>
                    </div>

                    <div class="flex space-x-3">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                            class="bg-blue-500 text-white px-4 py-2 rounded text-sm">
                            Edit
                        </a>

                        <!-- Delete Form -->
                        <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
                            onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-700">No job listings found</p>
            @endforelse

        </div>
    </section>
    <x-bottom-banner />
</x-layout>
