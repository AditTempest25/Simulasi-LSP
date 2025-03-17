<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-indigo-600 text-white flex flex-col">
        <div class="p-4 text-xl font-bold flex items-center space-x-2">
            <i class="fa-solid fa-user-tie"></i>
            <span>Halo, {{ Auth::user()->name }}</span>
        </div>

        <nav class="flex-1 px-4 space-y-2">
            <a href="{{ route('dashboard') }}" 
            class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
            {{ request()->is('dashboard') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('petugas.maskapai') }}" 
            class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
            {{ request()->routeIs('petugas.maskapai') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
                <i class="fa-solid fa-plane"></i>
                <span>Maskapai</span>
            </a>

            <a href="{{ route('petugas.master-kota') }}" 
            class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
            {{ request()->routeIs('petugas.master-kota') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
                <i class="fa-solid fa-location-dot"></i>
                <span>Master Kota</span>
            </a>

            <a href="{{ route('petugas.rute') }}" 
            class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
            {{ request()->routeIs('petugas.rute') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
                <i class="fa-solid fa-route"></i>
                <span>Rute</span>
            </a>

            <a href="{{ route('petugas.jadwal-maskapai') }}" 
            class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
            {{ request()->routeIs('petugas.jadwal-maskapai') ? 'bg-indigo-700' : 'hover:bg-indigo-500'   }}">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Jadwal Penerbangan</span>
            </a>
        </nav>

        <div class="p-4">
            <a href="{{ route('logout') }}" class="flex items-center space-x-2 p-2 rounded hover:bg-red-500 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                </svg>
                <span>Log Out</span>
            </a>
        </div>
    </aside>

</div>
