<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Jadwal Penerbangan - Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Jadwal Penerbangan (Petugas)</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('petugas.jadwal-maskapai.store') }}" method="POST">
                @csrf
                <!-- Rute -->
                <div class="mb-4">
                    <label for="id_rute" class="block text-gray-700 font-semibold mb-2">Rute:</label>
                    <select name="id_rute" id="id_rute" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($rute as $r)
                            <option value="{{ $r->id_rute }}">Rute {{ $r->id_rute }} ({{ $r->kotaAsal->nama_kota }}
                                ke {{ $r->kotaTujuan->nama_kota }})</option>
                        @endforeach
                    </select>
                </div>
                <!-- Waktu Berangkat -->
                <div class="mb-4">
                    <label for="waktu_berangkat" class="block text-gray-700 font-semibold mb-2">Waktu Berangkat:</label>
                    <input type="time" name="waktu_berangkat" id="waktu_berangkat" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Waktu Tiba -->
                <div class="mb-4">
                    <label for="waktu_tiba" class="block text-gray-700 font-semibold mb-2">Waktu Tiba:</label>
                    <input type="time" name="waktu_tiba" id="waktu_tiba" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Harga -->
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-semibold mb-2">Harga:</label>
                    <input type="number" name="harga" id="harga" required placeholder="Harga Tiket"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Kapasitas -->
                <div class="mb-4">
                    <label for="kapasitas" class="block text-gray-700 font-semibold mb-2">Kapasitas:</label>
                    <input type="number" name="kapasitas" id="kapasitas" required placeholder="Kapasitas Pesawat"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Tombol Submit -->
                <div class="text-center">
                    <a href="{{ route('petugas.jadwal-maskapai') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 px-6 rounded transition duration-200 me-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded transition duration-200">
                        <i class="fa-solid fa-floppy-disk me-2"></i>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
