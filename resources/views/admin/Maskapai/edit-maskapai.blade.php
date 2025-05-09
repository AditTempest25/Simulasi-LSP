<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Maskapai - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Maskapai</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.maskapai.update', $maskapai->id_maskapai) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Field Nama -->
                <div class="mb-4">
                    <label for="nama_maskapai" class="block text-gray-700 font-semibold mb-2">Nama Maskapai:</label>
                    <input type="text" name="nama_maskapai" id="nama_maskapai" value="{{ $maskapai->nama_maskapai }}" required
                           class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Field Foto -->
                <div class="mb-4">
                    <label for="logo_maskapai" class="block text-gray-700 font-semibold mb-2">Logo Maskapai:</label>
                    <input type="file" name="logo_maskapai" id="logo_maskapai"
                           class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if($maskapai->logo_maskapai)
                        <img src="{{ asset('storage/' . $maskapai->logo_maskapai) }}" alt="Logo Maskapai" class="mt-2 w-32 h-auto">
                    @endif
                </div>

                <!-- Field Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-semibold mb-2">Kelas:</label>
                    <select name="kelas" id="kelas" required
                            class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Ekonomi" {{ $maskapai->kelas == 'Ekonomi' ? 'selected' : '' }}>Ekonomi</option>
                        <option value="Bisnis" {{ $maskapai->kelas == 'Bisnis' ? 'selected' : '' }}>Bisnis</option>
                        <option value="Eksekutif" {{ $maskapai->kelas == 'Eksekutif' ? 'selected' : '' }}>Eksekutif</option>
                        <option value="Luxury" {{ $maskapai->kelas == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                    </select>
                </div>

                <!-- Field Status -->
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-semibold mb-2">Status:</label>
                    <select name="status" id="status" required
                            class="w-full border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Aktif" {{ $maskapai->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Tidak Aktif" {{ $maskapai->status == 'Tidak Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="text-center">
                    <a href="{{ route('admin.maskapai') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-3 px-6 rounded transition duration-200 me-4">
                        <i class="fa-solid fa-arrow-left me-2"></i>
                        Kembali
                    </a>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded transition duration-200">
                        <i class="fa-solid fa-pen-nib me-2"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>