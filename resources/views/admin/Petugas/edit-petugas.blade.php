<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Petugas</title>
    <!-- Sertakan Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Petugas</h2>
            <form action="{{ route('admin.data-petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama:</label>
                    <input type="text" name="name" id="name" value="{{ $petugas->name }}" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $petugas->email }}" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Tanggal Lahir -->
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block text-gray-700 font-semibold mb-2">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $petugas->tanggal_lahir }}"
                        required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-semibold mb-2">Alamat:</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $petugas->alamat }}" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Field Gender (jenis_kelamin) -->
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-gray-700 font-semibold mb-2">Gender:</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" required
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Laki-laki" {{ $petugas->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="Perempuan" {{ $petugas->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>
                <!-- Tombol Submit -->
                <div class="text-center">
                    <a href="{{ route('admin.data-petugas') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 px-6 rounded transition duration-200 me-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded transition duration-200">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
