<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-sidebar-admin></x-sidebar-admin>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-blue-800">Selamat Datang, {{ Auth::user()->name }}</h2>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <h3 class="text-xl text-blue-700 font-semibold">Total Pemesanan</h3>
                    <p class="text-3xl font-bold mt-2">12,340</p>
                </div>
                <div class="p-4 bg-indigo-500 text-white rounded-lg shadow">
                    <a href="{{ route('admin.jadwal-maskapai') }}">
                        <span class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Jadwal
                            Penerbangan</span>
                    </a>
                    <i class="fa-solid fa-calendar"></i>
                    <div class="flex items-center justify-between">
                        <span class="mt-5 text-3xl font-bold text-white dark:text-white">{{ $totalJadwal }}</span>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-lg shadow-md">
                    <h3 class="text-xl text-blue-700 font-semibold">Pendapatan</h3>
                    <p class="text-3xl font-bold mt-2">Rp 45.000.000</p>
                </div>
                <!-- Total Pesawat Aktif -->
                <div class="p-4 bg-indigo-500 text-white rounded-lg shadow">
                    <a href="{{ route('admin.maskapai') }}">
                        <span class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Total Pesawat
                            Aktif</span>
                        </a>
                        <i class="fa-solid fa-plane-up"></i>                    <div class="flex items-center justify-between">
                        <span class="mt-5 text-3xl font-bold text-white dark:text-white">{{ $totalPesawat }}</span>
                    </div>
                </div>

                <!-- Data Pengguna -->
                <div class="p-4 bg-indigo-500 text-white rounded-lg shadow">
                    <a href="{{ route('admin.data-pengguna') }}">
                        <span class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Data
                            Pengguna</span>
                        </a>
                        <i class="fa-solid fa-users"></i>
                    <div class="flex items-center justify-between">
                        <span class="mt-5 text-3xl font-bold text-white dark:text-white">{{ $totalPengguna }}</span>
                    </div>
                </div>

                <!-- Data Petugas -->
                <div class="p-4 bg-indigo-500 text-white rounded-lg shadow">
                    <a href="{{ route('admin.data-petugas') }}">
                        <span class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">Data
                            Petugas</span>
                        </a>
                        <i class="fa-solid fa-user-tie"></i>
                    <div class="flex items-center justify-between">
                        <span class="mt-5 text-3xl font-bold text-white dark:text-white">{{ $totalPetugas }}</span>
                    </div>
                </div>

            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                <h3 class="text-xl font-bold text-blue-800 mb-4">Pemesanan Terbaru</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-blue-700 text-white">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Keberangkatan</th>
                            <th class="p-3">Tujuan</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="p-3">12345</td>
                            <td class="p-3">Budi Santoso</td>
                            <td class="p-3">Jakarta</td>
                            <td class="p-3">Surabaya</td>
                            <td class="p-3">Rp 350.000</td>
                            <td class="p-3 text-green-600">✅ Sukses</td>
                        </tr>
                        <tr class="border-b">
                            <td class="p-3">12346</td>
                            <td class="p-3">Ayu Lestari</td>
                            <td class="p-3">Bandung</td>
                            <td class="p-3">Yogyakarta</td>
                            <td class="p-3">Rp 270.000</td>
                            <td class="p-3 text-red-600">❌ Batal</td>
                        </tr>
                        <tr>
                            <td class="p-3">12347</td>
                            <td class="p-3">Rizky Pratama</td>
                            <td class="p-3">Medan</td>
                            <td class="p-3">Jakarta</td>
                            <td class="p-3">Rp 550.000</td>
                            <td class="p-3 text-green-600">✅ Sukses</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
</body>

</html>
