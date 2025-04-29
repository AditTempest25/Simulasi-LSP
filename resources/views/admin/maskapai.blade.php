<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin - Maskapai</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex flex-col lg:flex-row h-full">
        <!-- Sidebar -->
        <x-sidebar-admin></x-sidebar-admin>

        <!-- Section utama -->
        <div class="flex-1 p-6 bg-white rounded-lg shadow-md m-4">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-blue-800">Maskapai</h2>
                <form method="GET" action="{{ route('admin.maskapai') }}" class="flex items-center space-x-4">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search Maskapai..."
                        class="px-3 py-2 border rounded-lg">
                    <button type="submit" class="px-3 py-2 bg-blue-700 text-white rounded-lg">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    @if (request('q'))
                        <a href="{{ route('admin.maskapai') }}" class="px-3 py-2 bg-gray-500 text-white rounded-lg">
                            <i class="fa-solid fa-times"></i> Reset
                        </a>
                    @endif
                </form>
            </div>

            <div class="relative overflow-x-auto mt-6">
                <div class="mb-6">
                    <a href="{{ route('admin.maskapai.create') }}"
                        class="px-4 py-2 bg-blue-700 rounded-md text-white hover:bg-blue-800 inline-flex items-center">
                        <i class="fa-solid fa-plus me-2"></i>Tambah Maskapai
                    </a>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-black dark:text-white">
                    <thead
                        class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-500 dark:text-white text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-white border dark:bg-white dark:border-gray-700 border-gray-200 dark:text-black text-center">
                        @foreach ($maskapai as $index => $m)
                            <tr class="border-b">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    @if ($m->logo_maskapai)
                                        <img src="{{ asset('storage/' . $m->logo_maskapai) }}" alt="Logo Maskapai"
                                            class="w-12 h-12 object-cover rounded-full">
                                    @else
                                        <span class="text-gray-500">Tidak ada logo</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $m->nama_maskapai }}</td>
                                <td class="px-6 py-4">{{ $m->kelas }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-3 py-1 rounded-md {{ $m->status == 'Aktif' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                        {{ $m->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.maskapai.edit', $m->id_maskapai) }}"
                                        class="px-2 py-1 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.maskapai.destroy', $m->id_maskapai) }}"
                                        method="POST" class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus maskapai ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 text-sm ms-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                            <i class="fa-solid fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $maskapai->links() }}
            </div>
        </div>
</body>

</html>
