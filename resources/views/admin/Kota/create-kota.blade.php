<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Petugas</title>
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
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Kota</h2>
            <form action="{{ route('admin.master-kota.store') }}" method="POST">
                @csrf
                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="nama_kota" class="block text-gray-700 font-semibold mb-2">Nama Kota:
                        @error('nama_kota')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror   
                    </label>
                    <input type="text" name="nama_kota" id="nama_kota" required placeholder="Nama Kota"
                        class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <a href="{{ route('admin.master-kota') }}"
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
