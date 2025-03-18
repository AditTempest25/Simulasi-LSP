<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Ticket</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body>

    <div class="bg-white">
        <x-navbar-penumpang></x-navbar-penumpang>

        <div class="container mx-auto py-10">
            <h1 class="text-3xl font-bold text-center mb-5">My Ticket</h1>

            @if ($tickets->isEmpty())
                <p class="text-center text-gray-500">Belum ada tiket yang dipesan.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border">No Struk</th>
                                <th class="py-2 px-4 border">Maskapai</th>
                                <th class="py-2 px-4 border">Rute</th>
                                <th class="py-2 px-4 border">Jumlah Tiket</th>
                                <th class="py-2 px-4 border">Tanggal Transaksi</th>
                                <th class="py-2 px-4 border">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border">{{ $ticket->no_struk }}</td>
                                    <td class="py-2 px-4 border">
                                        {{ $ticket->jadwalMaskapai?->rute?->maskapai?->nama_maskapai ?? 'nama maskapai ditemukan' }}
                                    </td>
                                    <td class="py-2 px-4 border">
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaAsal?->nama_kota ?? 'kota asal tidak ditemukan' }} Ke
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaTujuan?->nama_kota ?? 'kota tujuan tidak ditemukan' }}
                                    </td>
                                    <td class="py-2 px-4 border">{{ $ticket->total_tiket ?? 'total tiket tidak ditemukan' }}</td>
                                    <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($ticket->tanggal_transaksi)->format('d M Y, H:i') }}</td>
                                    <td class="py-2 px-4 border">
                                        <span class="px-3 py-1 text-white rounded
                                            {{ $ticket->status_verifikasi == 'verified' ? 'bg-green-500' : ($ticket->status_verifikasi == 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                            {{ ucfirst($ticket->status_verifikasi) }}
                                        </span>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <x-footer></x-footer>
    </div>

    <script>
        AOS.init();
    </script>

</body>

</html>
