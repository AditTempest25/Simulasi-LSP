<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{ route('dashboard') }}"
                            class=" px-3 py-2 text-sm font-medium text-white
                            {{ request()->routeIs('dashboard') ? 'rounded-md bg-gray-900' : 'hover:rounded-md hover:bg-gray-900' }}"
                            aria-current="page">Dashboard</a>
                        <a href="{{ route('travel') }}"
                            class="px-3 py-2 text-sm font-medium text-white
                            {{ request()->routeIs('travel') ? 'rounded-md bg-gray-900' : 'hover:rounded-md hover:bg-gray-900' }}"
                            aria-current="page">Travel</a>
                        <a href="{{ route('myticket') }}"
                            class="px-3 py-2 text-sm font-medium text-white
                            {{ request()->routeIs('myticket') ? 'rounded-md bg-gray-900' : 'hover:rounded-md hover:bg-gray-900' }}"
                            aria-current="page">My Ticket</a>
                        <a href="{{ route('history') }}" class="px-3 py-2 text-sm font-medium text-white
                        {{ request()->routeIs('history') ? 'rounded-md bg-gray-900' : 'hover:rounded-md hover:bg-gray-900' }}"
                            aria-current="page">History Pemesanan</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3">
                    <div>
                        <button type="button"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="size-8 rounded-full"
                                src="{{ auth()->user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=random' }}"
                                alt="{{ auth()->user()->name }}">

                        </button>
                    </div>
                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden"
                        id="user-menu" role="menu" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-0">Your Profile</a>
                        {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                            id="user-menu-item-1">Settings</a> --}}
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white"
                            role="menuitem" tabindex="-1" id="user-menu-item-2">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{ route('dashboard') }}"
                class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">Dashboard</a>
            <a href="{{ route('travel') }}"
                class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">Travel</a>
            <a href="{{ route('myticket') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">My Ticket</a>
            <a href="{{ route('history') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">History</a>
        </div>
    </div>
</nav>
