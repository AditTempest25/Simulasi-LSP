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

        <div class="container mx-auto py-10">
            <h1 class="text-3xl font-bold text-center mb-5">My Ticket</h1>

            @if ($tickets->isEmpty())
                <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-4">
                    <p>Anda belum pernah memesan tiket</p>
                </div>
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
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaAsal?->nama_kota ?? 'kota asal tidak ditemukan' }}
                                        Ke
                                        {{ $ticket->jadwalMaskapai?->rute?->kotaTujuan?->nama_kota ?? 'kota tujuan tidak ditemukan' }}
                                    </td>
                                    <td class="py-2 px-4 border">
                                        {{ $ticket->total_tiket ?? 'total tiket tidak ditemukan' }}</td>
                                    <td class="py-2 px-4 border">
                                        {{ \Carbon\Carbon::parse($ticket->tanggal_transaksi) }}
                                    </td>
                                    <td class="py-2 px-4 border">
                                        <span
                                            class="px-3 py-1 text-white rounded
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

        {{-- <x-footer></x-footer> --}}
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
