<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Petugas</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <x-sidebar-petugas></x-sidebar-petugas>

        <!-- Section utama -->
        <div class="flex-1 p-4 sm:p-6 lg:p-3">
            <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 lg:p-8">
                <!-- Header -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                    <h2 class="text-3xl font-bold text-blue-800 mb-4 sm:mb-0">Jadwal Penerbangan</h2>
                    <!-- Ubah action form ke route dashboard -->
                    <form method="GET" action="{{ route('dashboard') }}"
                        class="flex items-center space-x-2 w-full sm:w-auto">
                        <input type="date" name="date"
                            value="{{ request('date') ?? \Carbon\Carbon::today()->format('Y-m-d') }}"
                            onchange="this.form.submit()"
                            class="w-full sm:w-auto px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-black">
                        <thead class="text-xs uppercase bg-blue-500 text-white text-center">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Maskapai</th>
                                <th class="px-4 py-3">Rute</th>
                                <th class="px-4 py-3">Tanggal Berangkat</th>
                                <th class="px-4 py-3">Waktu Berangkat</th>
                                {{-- <th class="px-4 py-3">Waktu Tiba</th>
                                <th class="px-4 py-3">Harga</th>
                                <th class="px-4 py-3">Kapasitas</th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-center">
                            @forelse ($jadwal as $index => $j)
                                <tr>
                                    <td class="px-4 py-3">{{ $jadwal->firstItem() + $index }}</td>
                                    <td class="px-4 py-3">{{ $j->rute->maskapai->nama_maskapai }}</td>
                                    <td class="px-4 py-3">
                                        Rute {{ $j->rute->id_rute }}<br>
                                        ({{ $j->rute->kotaAsal->nama_kota }} - {{ $j->rute->kotaTujuan->nama_kota }})
                                    </td>
                                    <td class="px-4 py-3">{{ $j->rute->tanggal_pergi }}</td>
                                    <td class="px-4 py-3">{{ $j->waktu_berangkat }}</td>
                                    {{-- <td class="px-4 py-3">{{ $j->waktu_tiba }}</td>
                                    <td class="px-4 py-3">Rp. {{ number_format($j->harga, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">{{ $j->kapasitas }}</td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-3 text-center">
                                        Tidak ada jadwal penerbangan untuk tanggal yang dipilih. Silakan pilih tanggal
                                        lain.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="mt-6">
                    {{ $jadwal->links() }}
                </div>

                <!-- Section History Pembelian -->
                <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 lg:p-8 mt-8">
                    <h2 class="text-3xl font-bold text-green-700 mb-6">History Pembelian Tiket</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-black">
                            <thead class="text-xs uppercase bg-green-500 text-white text-center">
                                <tr>
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Nama Penumpang</th>
                                    <th class="px-4 py-3">Maskapai</th>
                                    <th class="px-4 py-3">Rute</th>
                                    <th class="px-4 py-3">Tanggal Pembelian</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-center">
                                @forelse ($history as $index => $h)
                                    <tr>
                                        <td class="px-4 py-3">{{ $history->firstItem() + $index }}</td>
                                        <td class="px-4 py-3">{{ $h->ordertiket->users->name }}</td>
                                        <td class="px-4 py-3">
                                            {{ $h->ordertiket->jadwalMaskapai->rute->maskapai->nama_maskapai }}</td>
                                        <td class="px-4 py-3">
                                            ({{ $h->ordertiket->jadwalMaskapai->rute->kotaAsal->nama_kota }} -
                                            {{ $h->ordertiket->jadwalMaskapai->rute->kotaTujuan->nama_kota }})
                                        </td>
                                        <td class="px-4 py-3">{{ $h->created_at->format('d M Y') }}</td>
                                        <td class="px-4 py-3">
                                            @if ($h->status == 'verified')
                                                <span class="text-green-600">✅ Sukses</span>
                                            @elseif ($h->status == 'rejected')
                                                <span class="text-red-600">❌ Batal</span>
                                            @else
                                                <span class="text-yellow-500">⏳ Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-center">Belum ada history pembelian
                                            tiket.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination History -->
                    <div class="mt-6">
                        {{ $history->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
