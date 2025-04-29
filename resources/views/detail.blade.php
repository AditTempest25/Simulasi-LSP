<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>
    <div class="bg-white">
        <div class="bg-gray-100 min-h-screen py-10">
            <div class="max-w-6xl mx-auto px-4">
                <!-- Card -->
                <div class="bg-white p-8 rounded-2xl shadow-xl grid grid-cols-1 md:grid-cols-2 gap-10">
                    <!-- Image -->
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('storage/' . $detail->rute->maskapai->logo_maskapai) }}"
                            alt="Logo Maskapai"
                            class="rounded-xl shadow-lg w-full max-w-[300px] object-contain">
                    </div>

                    <!-- Info -->
                    <div class="space-y-4">
                        <h2 class="text-3xl font-bold text-gray-900">{{ $detail->rute->maskapai->nama_maskapai }}</h2>

                        <div class="text-lg font-semibold text-gray-700">
                            Harga:
                            <span id="harga_satuan" data-harga="{{ $detail->harga }}" class="text-blue-600 font-bold">
                                Rp {{ number_format($detail->harga, 0, ',', '.') }}
                            </span>
                        </div>

                        <p class="text-gray-600 font-medium">Kapasitas: {{ $detail->kapasitas }} kursi</p>

                        <div>
                            <label class="block text-sm text-gray-600 mb-1 font-medium">Rute</label>
                            <input type="text" readonly
                                value="{{ $detail->rute->kotaAsal->nama_kota }} → {{ $detail->rute->kotaTujuan->nama_kota }}"
                                class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 font-semibold text-sm">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Jam Berangkat</label>
                                <input type="text" readonly value="{{ $detail->waktu_berangkat }}"
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 font-semibold text-sm">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Jam Tiba</label>
                                <input type="text" readonly value="{{ $detail->waktu_tiba }}"
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 font-semibold text-sm">
                            </div>
                        </div>

                        <form action="{{ route('order.store') }}" method="POST" class="space-y-4 mt-6">
                            @csrf
                            <input type="hidden" name="id_jadwal" value="{{ $detail->id_jadwal }}">

                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Total Tiket</label>
                                <input type="number" id="total_tiket" name="total_tiket"
                                    value="1" min="1" max="{{ $detail->kapasitas }}"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm text-gray-600 mb-1 font-medium">Total Harga</label>
                                <input type="text" id="total_harga_display" readonly
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 font-bold text-sm">
                                <input type="hidden" id="total_harga" name="total_harga">
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-5 rounded-lg font-semibold transition duration-200 shadow">
                                <i class="fa-solid fa-cart-shopping mr-2"></i>Beli Sekarang
                            </button>
                        </form>

                        <a href="{{ route('travel') }}"
                            class="block text-center bg-gray-200 hover:bg-gray-300 text-gray-800 py-2 px-5 rounded-lg font-semibold transition duration-200 mt-4">
                            ← Kembali
                        </a>

                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-4">
                                <ul class="text-sm list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        AOS.init();

        document.addEventListener('DOMContentLoaded', function() {
            const tiketInput = document.getElementById('total_tiket');
            const totalHargaDisplay = document.getElementById('total_harga_display');
            const totalHargaHidden = document.getElementById('total_harga');
            const harga = parseInt(document.getElementById('harga_satuan').dataset.harga);

            function updateHarga() {
                const jumlah = parseInt(tiketInput.value) || 0;
                const total = jumlah * harga;
                totalHargaDisplay.value = total.toLocaleString('id-ID');
                totalHargaHidden.value = total;
            }

            tiketInput.addEventListener('input', updateHarga);
            updateHarga();
        });
    </script>

</body>

</html>
