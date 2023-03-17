@php
    $user = session('user');
    $userFullname = "{$user['first_name']} {$user['last_name']}";
@endphp
<nav class="border-gray-200 px-2 sm:px-4 py-2.5 bg-gray-900">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap text-white">{{ $userFullname }}, Welcome!</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col px-4 py-2 mt-4 border rounded-lg bg-gray-900 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0 bg-gray-800 border-gray-700">
                <li>
                    <a href="{{ route('dashboard') }}" class="menu-item block py-2 pl-3 pr-4 text-gray-300 bg-blue-700 rounded" aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('books.create') }}" class="menu-item block py-2 pl-3 pr-4 text-gray-300 bg-blue-700 rounded" aria-current="page">Create Book</a>
                </li>
                <li>
                    <a href="{{ route('users.profile', ['userId' => $user['id']]) }}" class="menu-item block py-2 pl-3 pr-4 text-gray-300 bg-blue-700 rounded" aria-current="page">Profile</a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded" aria-current="page">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>