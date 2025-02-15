<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Petugas</title>
    <!-- Sertakan Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Kota</h2>
            <form action="{{ route('admin.master-kota.store') }}" method="POST">
                @csrf
                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="nama_kota" class="block text-gray-700 font-semibold mb-2">Nama Kota:</label>
                    <input type="text" name="nama_kota" id="nama_kota" required placeholder="Nama Kota"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Tombol Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded transition duration-200">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
