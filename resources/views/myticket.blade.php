<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Ticket</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">

    <div class="flex-grow">
        <x-navbar-penumpang />

        <div class="container mx-auto py-12 px-4">
            <h1 class="text-4xl font-extrabold text-center text-blue-700 mb-8" data-aos="fade-down">🎫 My Ticket</h1>

            @if ($tickets->isEmpty())
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-5 rounded-md shadow-md text-center"
                    data-aos="fade-up">
                    <p class="text-lg font-semibold">Belum ada tiket yang kamu pesan, yuk traveling!</p>
                </div>
            @else
                <div class="overflow-x-auto" data-aos="fade-up" data-aos-delay="100">
                    <table class="min-w-full text-sm text-gray-800 bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="py-3 px-6 text-left">No Struk</th>
                                <th class="py-3 px-6 text-left">Maskapai</th>
                                <th class="py-3 px-6 text-left">Rute</th>
                                <th class="py-3 px-6 text-center">Jumlah Tiket</th>
                                <th class="py-3 px-6 text-center">Tanggal Transaksi</th>
                                <th class="py-3 px-6 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr class="border-b hover:bg-blue-50 transition duration-300">
                                    <td class="py-4 px-6">{{ $ticket->no_struk }}</td>
                                    <td class="py-4 px-6">
                                        {{ $ticket->jadwalMaskapai?->rute?->maskapai?->nama_maskapai ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaAsal?->nama_kota ?? '-' }}
                                        ➔
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaTujuan?->nama_kota ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{ $ticket->total_tiket ?? '-' }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        {{ \Carbon\Carbon::parse($ticket->tanggal_transaksi)->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-6 text-center">
                                        <span
                                            class="px-3 py-1 rounded-full text-white font-bold
                                            {{ $ticket->status_verifikasi == 'verified' ? 'bg-green-500' : ($ticket->status_verifikasi == 'rejected' ? 'bg-red-500' : 'bg-yellow-400') }}">
                                            {{ ucfirst($ticket->status_verifikasi) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-6 flex justify-center">
                    {{ $tickets->links('vendor.pagination.tailwind') }}
                </div>

            @endif
        </div>
    </div>

    <script>
        AOS.init();
    </script>

</body>

</html>
