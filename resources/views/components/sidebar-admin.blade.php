<div class="fixed z-40 top-0 left-0 h-screen w-64 bg-indigo-600 text-white transform -translate-x-full transition-transform duration-300 md:translate-x-0 md:relative md:flex md:flex-col" id="sidebar">
    <div class="flex items-center justify-between h-16 border-b border-indigo-500 px-4">
        <div class="flex items-center">
            <i class="fa-solid fa-user-secret"></i>
            <h1 class="ms-4 font-bold text-center">HALAMAN ADMIN</h1>
        </div>
    </div>

    <nav id="sidebar-nav" class="flex-1 px-4 py-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->is('dashboard') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.data-petugas') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.data-petugas') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-user-tie"></i>
            <span>Data Petugas</span>
        </a>
        <a href="{{ route('admin.data-pengguna') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.data-pengguna') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-users"></i>
            <span>Data Pengguna</span>
        </a>
        <a href="{{ route('admin.maskapai') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.maskapai') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-plane"></i>
            <span>Maskapai</span>
        </a>
        <a href="{{ route('admin.master-kota') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.master-kota') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-location-dot"></i>
            <span>Master Kota</span>
        </a>
        <a href="{{ route('admin.rute') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.rute') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-map-location-dot"></i>
            <span>Rute</span>
        </a>
        <a href="{{ route('admin.jadwal-maskapai') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.jadwal-maskapai') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-calendar"></i>
            <span>Jadwal Penerbangan</span>
        </a>
        <a href="{{ route('admin.verifikasi') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg transition {{ request()->routeIs('admin.verifikasi') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-user-check"></i>
            <span>Verifikasi</span>
        </a>
    </nav>

    <div class="p-4">
        <a href="{{ route('logout') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg hover:bg-red-500 transition">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</div>
