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
    <!-- Tambahin di head -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }

        th,
        td {
            white-space: nowrap;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        tbody tr:hover {
            background-color: #f1f5f9;
        }
    </style>

</head>

<body>
    <div class="flex flex-col lg:flex-row h-full">

        <!-- Hamburger Button -->
        <button id="hamburgerBtn" class="md:hidden p-4 text-2xl absolute top-4 left-4 z-50">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Sidebar -->
        <x-sidebar-admin></x-sidebar-admin>

        <!-- Main Content -->
        <main class="flex-1 p-8 space-y-6">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-blue-800">Selamat Datang, {{ Auth::user()->name }}</h2>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all">
                    <h3 class="text-xl text-gray-600 font-semibold">Total Pemesanan</h3>
                    <p class="text-4xl font-bold text-blue-700 mt-2">{{ $totalPemesanan }}</p>
                </div>
                <div class="p-5 bg-indigo-600 text-white rounded-xl shadow hover:shadow-lg transition-all">
                    <a href="{{ route('admin.jadwal-maskapai') }}" class="block">
                        <h3 class="text-xl font-semibold mb-2">Jadwal Penerbangan</h3>
                        <i class="fa-solid fa-calendar text-2xl mb-4"></i>
                        <p class="text-4xl font-bold">{{ $totalJadwal }}</p>
                    </a>
                </div>
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all">
                    <h3 class="text-xl text-gray-600 font-semibold">Pendapatan</h3>
                    <p class="text-4xl font-bold text-green-600 mt-2">Rp
                        {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all">
                    <h3 class="text-xl text-gray-600 font-semibold">Pesawat
                        Aktif</h3>
                    <p class="text-4xl font-bold text-blue-700 mt-2">{{ $totalPesawat }}</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all">
                    <h3 class="text-xl text-gray-600 font-semibold">Data
                        Pengguna</h3>
                    <p class="text-4xl font-bold text-blue-700 mt-2">{{ $totalPengguna }}</p>
                </div>
                <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition-all">
                    <h3 class="text-xl text-gray-600 font-semibold">Data
                        Petugas</h3>
                    <p class="text-4xl font-bold text-blue-700 mt-2">{{ $totalPetugas }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md overflow-auto">
                <h3 class="text-xl font-bold text-blue-800 mb-4">Pemesanan Terbaru</h3>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="bg-blue-700 text-white">
                            <th class="p-3">ID</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Maskapai</th>
                            <th class="p-3">Keberangkatan</th>
                            <th class="p-3">Tujuan</th>
                            <th class="p-3">Tanggal</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @forelse ($orderDetails as $order)
                            <tr class="border-b hover:bg-gray-50 text-center">
                                <td class="p-3 font-medium">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $order->name ?? '-' }}</td>
                                <td class="p-3">{{ $order->nama_maskapai ?? '-' }}</td>
                                <td class="p-3">{{ $order->kota_asal ?? '-' }}</td>
                                <td class="p-3">{{ $order->kota_tujuan ?? '-' }}</td>
                                <td class="p-3">{{ $order->ordertiket->jadwalmaskapai->rute->tanggal_pergi ?? '-' }}
                                </td>
                                <td class="p-3 text-right">Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="p-3">
                                    @if ($order->status == 'verified')
                                        <span class="text-green-600 font-semibold">✅ Sukses</span>
                                    @elseif ($order->status == 'rejected')
                                        <span class="text-red-600 font-semibold">❌ Batal</span>
                                    @else
                                        <span class="text-yellow-500 font-semibold">⏳ Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4 text-gray-500">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const hamburgerBtn = document.getElementById('hamburgerBtn');

        // Ketika tombol hamburger diklik, toggle sidebar
        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full'); // Toggle sidebar hide/show
        });
    </script>

</body>

</html>
