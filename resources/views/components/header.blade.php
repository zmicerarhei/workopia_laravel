<header class="bg-blue-900 text-white p-4" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ route('home') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
            <x-nav-link url="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')">All Jobs</x-nav-link>
            @auth
                <a href="/jobs/saved" class="text-white hover:underline py-2">Saved Jobs</a>

                {{-- <a href="{{ route('dashboard') }}" class="text-white hover:underline py-2">
                    <i class="fa fa-gauge mr-1"></i> Dashboard
                </a> --}}
                <x-logout-button></x-logout-button>
                <x-button-link url="{{ route('jobs.create') }}" icon="edit">Create Job</x-button-link>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('dashboard') }}" class="">
                        @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 object-cover rounded-full">
                        @else
                            <img src="{{ asset('storage/avatars/default-avatar.png') }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 object-cover rounded-full">
                        @endif
                    </a>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-white hover:underline py-2">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:underline py-2">Register</a>
            @endauth
        </nav>
        <button @click="open = !open" id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div x-show="open" x-transition @click.away="open = false" id="mobile-menu"
        class="md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2">
        <x-nav-link url="{{ route('home') }}" :active="request()->routeIs('home')" :mobile="true">Home</x-nav-link>
        <x-nav-link url="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')" :mobile="true">All Jobs</x-nav-link>
        @auth
            <x-nav-link url="/jobs/saved" :active="request()->routeIs('jobs.saved')" :mobile="true">Saved Jobs</x-nav-link>
            <x-nav-link url="/user/dashboard" :active="request()->routeIs('user.dashboard')" :mobile="true">Dashboard</x-nav-link>
            <x-button-link url="{{ route('jobs.create') }}" icon="edit" :block="true">Create Job</x-button-link>
            <x-logout-button :mobile="true"></x-logout-button>
        @else
            <x-nav-link url="{{ route('login') }}" :active="request()->routeIs('login')" :mobile="true">Login</x-nav-link>
            <x-nav-link url="{{ route('register') }}" :active="request()->routeIs('register')" :mobile="true">Register</x-nav-link>
        @endauth
    </div>
</header>
