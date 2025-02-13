<x-layout>
    <x-slot name="title">Show Job</x-slot>
    <h1 class="text-3xl font-semibold">{{ $job->title }}</h1>
    <p class="mt-4">{{ $job->description }}</p>
</x-layout>
