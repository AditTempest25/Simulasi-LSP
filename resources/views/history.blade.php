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

<body class="min-h-screen flex flex-col">

    <div class="bg-white flex-grow">
        <x-navbar-penumpang></x-navbar-penumpang>

        <div class="container mx-auto py-8">
            <h1 class="text-3xl font-bold mb-6">Riwayat Pemesanan Tiket</h1>

            @if ($tickets->isEmpty())
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4">
                    <p>Anda belum memiliki tiket yang sudah di-approve.</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 text-center">No. Tiket</th>
                                <th class="py-3 px-4 text-center">Nama Maskapai</th>
                                <th class="py-3 px-4 text-center">Rute</th>
                                <th class="py-3 px-4 text-center">Waktu</th>
                                <th class="py-3 px-4 text-center">Jumlah</th>
                                <th class="py-3 px-4 text-center">Total Harga</th>
                                <th class="py-3 px-4 text-center">Tanggal</th>
                                <th class="py-3 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-center">
                            @foreach ($tickets as $ticket)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $ticket->orderTiket->no_struk }}</td>
                                    <td class="py-3 px-4">{{ $ticket->nama_maskapai }}</td>
                                    <td class="py-3 px-4">
                                        {{ $ticket->kota_asal }} → {{ $ticket->kota_tujuan }}
                                    </td>
                                    <td class="py-3 px-4">
                                        {{ $ticket->waktu_berangkat }} - {{ $ticket->waktu_tiba }}
                                    </td>
                                    <td class="py-3 px-4">{{ $ticket->total_tiket }} Tiket</td>
                                    <td class="py-3 px-4">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4">
                                        {{ \Carbon\Carbon::parse($ticket->tanggal_transaksi)->format('d M Y') }}</td>
                                    <td class="py-3 px-4">
                                        <a href="{{ route('ticket-pdf', $ticket->id_order_detail) }}"
                                            class="bg-red-500 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                                            <i class="fas fa-file-pdf mr-2"></i> View PDF
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <script>
        AOS.init();

        // Profile dropdown functionality
        const profileButton = document.getElementById('user-menu-button');
        const profileMenu = document.querySelector('[aria-labelledby="user-menu-button"]');

        // Profile dropdown toggle
        if (profileButton && profileMenu) {
            profileButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const isExpanded = profileButton.getAttribute('aria-expanded') === 'true';
                profileButton.setAttribute('aria-expanded', !isExpanded);
                profileMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!profileButton.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                    profileButton.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // Mobile menu functionality
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                // Toggle menu visibility
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');

                // Toggle menu icons
                const menuIcons = mobileMenuButton.querySelectorAll('svg');
                menuIcons.forEach(icon => icon.classList.toggle('hidden'));
            });
        }
    </script>

</body>

</html>
