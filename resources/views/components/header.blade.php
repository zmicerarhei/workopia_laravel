<header class="bg-blue-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href="{{ route('home') }}">Workopia</a>
        </h1>
        <nav class="hidden md:flex items-center space-x-4">
            <x-nav-link url="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link>
            <x-nav-link url="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')">All Jobs</x-nav-link>
            {{-- <a href="{{ route('jobs.saved') }}" class="text-white hover:underline py-2">Saved Jobs</a>
            <a href="{{ route('user.login') }}" class="text-white hover:underline py-2">Login</a>
            <a href="{{ route('user.register') }}" class="text-white hover:underline py-2">Register</a>
            <a href="{{ route('user.dashboard') }}" class="text-white hover:underline py-2">
            <i class="fa fa-gauge mr-1"></i> Dashboard
            </a> --}}
            <x-button-link url="{{ route('jobs.create') }}" icon="edit">Create Job</x-button-link>
        </nav>
        <button id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-blue-900 text-white mt-5 pb-4 space-y-2">
        <x-nav-link url="{{ route('home') }}" :active="request()->routeIs('home')" :mobile="true">Home</x-nav-link>
        <x-nav-link url="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')" :mobile="true">All Jobs</x-nav-link>
        {{-- <x-nav-link url="{{ route('jobs.saved') }}" :active="request()->routeIs('jobs.saved')" :mobile="true">Saved Jobs</x-nav-link>
        <x-nav-link url="{{ route('user.login') }}" :active="request()->routeIs('user.login')" :mobile="true">Login</x-nav-link>
        <x-nav-link url="{{ route('user.register') }}" :active="request()->routeIs('user.register')" :mobile="true">Register</x-nav-link>
        <x-nav-link url="{{ route('user.dashboard') }}" :active="request()->routeIs('user.dashboard')" :mobile="true">Dashboard</x-nav-link> --}}
        <x-button-link url="{{ route('jobs.create') }}" icon="edit" :block="true">Create Job</x-button-link>
    </div>
</header>
