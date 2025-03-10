<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
        <i class="fa fa-sign-out mr-1"></i> Logout
    </button>
</form>
