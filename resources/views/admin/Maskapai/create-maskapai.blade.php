<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Maskapai</title>
    <!-- Sertakan Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Maskapai</h2>
            
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-200 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.maskapai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="nama_maskapai" class="block text-gray-700 font-semibold mb-2">Nama Maskapai:</label>
                    <input type="text" name="nama_maskapai" id="nama_maskapai" required placeholder="Nama Maskapai"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Field Foto -->
                <div class="mb-4">
                    <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto:</label>
                    <input type="file" name="logo_maskapai" id="foto" 
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Field Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-semibold mb-2">Kelas:</label>
                    <select name="kelas" id="kelas" required 
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Eksekutif">Eksekutif</option>
                        <option value="Luxury">Luxury</option>
                    </select>
                </div>

                <!-- Field Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status:</label>
                    <select name="status" id="status" required 
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Non-Aktif</option>
                    </select>
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
