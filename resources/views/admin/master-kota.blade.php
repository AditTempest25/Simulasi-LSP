<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Admin</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-sidebar-admin></x-sidebar-admin>

        <!-- Section utama -->
        <div class="flex-1 p-6 bg-white rounded-lg shadow-md m-4">
            <!-- Header -->
            <h2 class="text-3xl font-bold text-blue-800 mb-4">Master Kota</h2>
            <div class="mb-6">
                <a href="{{ route('admin.master-kota.create') }}"
                    class="px-4 py-2 bg-blue-700 rounded-md text-white hover:bg-blue-800 inline-flex items-center">
                    <i class="fa-solid fa-plus me-2"></i>Tambah Petugas
                </a>
            </div>

            <div class="relative overflow-x-auto mt-6">
                <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-blue-500 dark:bg-blue-500 dark:text-white text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Kota
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody
                        class="bg-white border dark:bg-white dark:border-gray-700 border-gray-200 dark:text-black text-center">
                        @foreach ($kota as $index => $k)
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4">{{ $k->nama_kota }}</td>
                                <td class="px-6 py-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.master-kota.edit', $k->id) }}"
                                        class="px-2 py-1 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                    </a>

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.master-kota.destroy', $k->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin hapus data?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-2 py-1 text-sm ms-2 text-white bg-red-700 rounded-md hover:bg-red-800">
                                            <i class="fa-solid fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>
