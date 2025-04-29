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
    <div class="flex flex-col lg:flex-row h-full">
        <!-- Sidebar -->
        <x-sidebar-admin></x-sidebar-admin>

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <div class="relative">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs uppercase bg-blue-500 text-white text-center">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                No Order
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jadwal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pesan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Tiket
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border border-gray-200 text-center">
                        @foreach ($orderTiket as $index => $ot)
                            <tr>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $ot->no_struk }}</td>
                                <td class="px-6 py-4">{{ $ot->users->name }}</td>
                                <td class="px-6 py-4">{{ $ot->jadwalMaskapai?->rute?->tanggal_pergi ?? '-' }} </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($ot->tanggal_transaksi)->format('d-m-Y H:i') }}
                                </td>
                                <td class="px-6 py-4">{{ $ot->total_tiket }}</td>
                                <td class="px-6 py-4">
                                    @if ($ot->status_verifikasi == 'pending')
                                        <span class="text-yellow-500">Pending</span>
                                    @elseif ($ot->status_verifikasi == 'verified')
                                        <span class="text-green-500">Verified</span>
                                    @elseif ($ot->status_verifikasi == 'rejected')
                                        <span class="text-red-500">Rejected</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if ($ot->status_verifikasi == 'pending')
                                        <div class="flex justify-center gap-2">
                                            <form action="{{ route('admin.verifikasi.approve', $ot->id_order) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-green-500 hover:text-green-700"
                                                    onclick="return confirm('Yakin mau Approve?')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.verifikasi.reject', $ot->id_order) }}"
                                                method="POST" onclick="return confirm('Yakin mau Reject?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-gray-400">Selesai</span>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </main>
</body>

</html>
