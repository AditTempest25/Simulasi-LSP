<div class="h-screen w-64 bg-indigo-600 text-white flex flex-col">
    <div class="flex items-center justify-center h-16 border-b border-indigo-500">
        <i class="fa-solid fa-backward"></i>
        <h1 class="ms-4 font-bold">ADMIN</h1>
    </div>
    
    <nav class="flex-1 px-4 py-4">
        <a href="{{ route('dashboard') }}" 
           class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
           {{ request()->is('dashboard') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.data-petugas') }}" 
           class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
           {{ request()->is('data-petugas') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-user-tie"></i>
            <span>Data Petugas</span>
        </a>

        <a href="{{ route('admin.data-pengguna') }}" 
           class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
           {{ request()->is('data-pengguna') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
            <i class="fa-solid fa-users"></i>
            <span>Data Pengguna</span>
        </a>

        <a href="{{ route('admin.maskapai') }}" 
           class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
           {{ request()->is('admin.maskapai') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
           <i class="fa-solid fa-plane"></i>
           <span>Maskapai</span>
        </a>

        <a href="{{ route('admin.master-kota') }}" 
           class="flex items-center space-x-2 text-white p-2 rounded-lg transition 
           {{ request()->is('admin.master-kota') ? 'bg-indigo-700' : 'hover:bg-indigo-500' }}">
           <i class="fa-solid fa-location-dot"></i>
            <span>Master Kota</span>
        </a>
    </nav>

    <div class="p-4">
        <a href="{{ route('logout') }}" class="flex items-center space-x-2 text-white p-2 rounded-lg hover:bg-red-500 transition">
            <i class="fa-solid fa-right-to-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</div>

