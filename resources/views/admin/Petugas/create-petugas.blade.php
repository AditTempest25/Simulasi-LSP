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
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Petugas</h2>
            <form action="{{ route('admin.data-petugas.store') }}" method="POST">
                @csrf
                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama:</label>
                    <input type="text" name="name" id="name" required placeholder="Full Name"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="email" name="email" id="email" required placeholder="Email Address"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password:</label>
                    <input type="text" name="password" id="password" value="{{ $password }}" readonly
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold mb-2">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-semibold mb-2">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" required placeholder="Alamat"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Gender (ubah name dari 'gender' menjadi 'jenis_kelamin') -->
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700 font-semibold mb-2">Gender:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
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
