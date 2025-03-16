<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Penerbangan</title>
    <link href="/src/styles.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            {{-- <h2 class="text-2xl font-bold tracking-tight text-gray-900">Jadwal Penerbangan</h2> --}}

            <!-- Grid Layout mirip 'Customers also purchased' -->
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 
                        sm:grid-cols-2 
                        lg:grid-cols-4 
                        xl:gap-x-8">
                @forelse ($jadwal as $item)
                    <div class="group relative border p-4 rounded-lg shadow-lg">
                        <!-- Gambar maskapai -->
                        <img src="{{ asset($item->rute->maskapai ? 'storage/' . $item->rute->maskapai->logo_maskapai : 'default_logo.png') }}"
                             alt="Maskapai {{ $item->rute->maskapai ? $item->rute->maskapai->nama_maskapai : 'Tidak tersedia' }}"
                             class="w-full h-auto rounded-md bg-gray-200 object-cover group-hover:opacity-75">

                        <!-- Informasi jadwal -->
                        <div class="mt-4 flex justify-between">
                            <div>
                                <!-- Nama Maskapai -->
                                <h3 class="text-sm text-gray-700 font-bold">
                                    {{ optional($item->rute->maskapai)->nama_maskapai ?? 'Nama Maskapai Tidak Tersedia' }}
                                </h3>
                                <!-- Rute Kota Asal → Kota Tujuan -->
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $item->rute->kotaAsal->nama_kota }} → {{ $item->rute->kotaTujuan->nama_kota }}
                                </p>
                                <!-- Tanggal Pergi -->
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $item->tanggal_pergi }}
                                </p>
                            </div>
                            <div class="text-right">
                                <!-- Waktu Berangkat - Tiba -->
                                <p class="text-sm font-medium text-gray-900">
                                    {{ \Carbon\Carbon::parse($item->waktu_berangkat)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($item->waktu_tiba)->format('H:i') }}
                                </p>
                                <!-- Harga -->
                                <p class="text-sm font-medium text-gray-900">
                                    Rp. {{ number_format($item->harga, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada jadwal penerbangan tersedia.</p>
                @endforelse
            </div>

            <!-- Pagination (opsional) -->
            {{-- 
            <div class="mt-4">
                {{ $jadwal->links() }}
            </div> 
            --}}
        </div>
    </div>
</body>
</html>
