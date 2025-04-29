<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel</title>
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

        {{-- <section class="bg-white dark:bg-white" data-aos="fade-up">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-12">
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg dark:bg-gray-800 p-6">
                    <form class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Asal -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota
                                Asal</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Masukkan kota asal">
                        </div>

                        <!-- Tujuan -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota
                                Tujuan</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Masukkan kota tujuan">
                        </div>

                        <!-- Tanggal Berangkat -->
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Berangkat</label>
                            <input type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <!-- Tombol Cari -->
                        <div class="md:col-span-3">
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                CARI PENERBANGAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section> --}}

        <div class="py-6" data-aos="fade-up">
            <!-- Promo Section -->
            <section class="py-12 bg-gradient-to-r from-blue-100 to-blue-50" data-aos="fade-up">
                <div class="max-w-screen-xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold text-blue-700 mb-8">🔥 Promo Terbaru 🔥</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white shadow-md rounded-lg p-6 hover:scale-105 transition-transform">
                            <i class="fas fa-percent text-4xl text-red-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Diskon 20%!</h3>
                            <p class="text-gray-600">Buat rute Jakarta - Bali. Buruan sebelum kehabisan! 🚀</p>
                        </div>
                        <div class="bg-white shadow-md rounded-lg p-6 hover:scale-105 transition-transform">
                            <i class="fas fa-ticket-alt text-4xl text-green-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Buy 1 Get 1</h3>
                            <p class="text-gray-600">Beli tiket buat 2 orang, cuma bayar 1 tiket. Gila kan?</p>
                        </div>
                        <div class="bg-white shadow-md rounded-lg p-6 hover:scale-105 transition-transform">
                            <i class="fas fa-plane-departure text-4xl text-blue-500 mb-4"></i>
                            <h3 class="text-xl font-bold mb-2">Flash Sale!</h3>
                            <p class="text-gray-600">Diskon up to 50% buat 3 jam ke depan aja!</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tiket Termurah Section -->
            <section class="py-12 bg-white" data-aos="fade-up">
                <div class="max-w-screen-xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">💸 Tiket Termurah Minggu Ini 💸</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($termurah as $item)
                            <div class="bg-white shadow-md rounded-lg p-4 hover:shadow-xl transition duration-300">
                                <h4 class="text-xl font-bold text-blue-600">{{ $item->rute->kotaAsal->nama_kota }} →
                                    {{ $item->rute->kotaTujuan->nama_kota }}</h4>
                                <p class="mt-2 text-red-500 font-semibold">Mulai dari IDR
                                    {{ number_format($item->harga, 0, ',', '.') }}</p>
                                <p class="text-gray-500 text-sm">{{ $item->rute->maskapai->nama_maskapai }} |
                                    {{ $item->rute->maskapai->kelas }}</p>
                                <a href="{{ route('detail', $item->id_jadwal) }}"
                                    class="mt-4 block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                                    Pesan Sekarang
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Maskapai Favorit Section -->
            <section class="py-12 bg-blue-50" data-aos="fade-up">
                <div class="max-w-screen-xl mx-auto px-4 text-center">
                    <h2 class="text-3xl font-bold text-blue-700 mb-8">🏆 Maskapai Terfavorit 🏆</h2>
                    <div class="flex flex-wrap justify-center gap-8">
                        <div class="bg-white shadow-md rounded-lg p-6 w-60 hover:scale-105 transition-transform">
                            <img src="{{ asset('storage/maskapai/garuda.png') }}" alt="Garuda"
                                class="w-20 h-20 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-800">Garuda Indonesia</h3>
                            <p class="text-gray-500 text-sm">★★★★★</p>
                        </div>
                        <div class="bg-white shadow-md rounded-lg p-6 w-60 hover:scale-105 transition-transform">
                            <img src="{{ asset('storage/maskapai/batik.png') }}" alt="Batik Air"
                                class="w-20 h-20 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-800">Batik Air</h3>
                            <p class="text-gray-500 text-sm">★★★★☆</p>
                        </div>
                        <div class="bg-white shadow-md rounded-lg p-6 w-60 hover:scale-105 transition-transform">
                            <img src="{{ asset('storage/maskapai/citilink.png') }}" alt="Citilink"
                                class="w-20 h-20 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-800">Citilink</h3>
                            <p class="text-gray-500 text-sm">★★★★☆</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container mx-auto max-w-screen-lg mt-6 px-4">
                @if ($jadwal->isEmpty())
                    <div class="flex flex-col items-center justify-center py-12" data-aos="fade-up">
                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076500.png" alt="No Flights"
                            class="w-40 h-40 mb-6 animate-bounce">
                        <h3 class="text-2xl font-bold text-gray-700 mb-2 text-center">Waduh, semua pesawat penuh!</h3>
                        <p class="text-gray-500 text-center mb-4">Coba cari tanggal lain yaa, siapa tau ada yang kosong
                            🤙</p>
                        <a href="{{ url()->current() }}"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition-all duration-300">Refresh</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($jadwal as $data)
                            <div class="bg-white shadow-md rounded-lg p-4 h-full" data-aos="zoom-in">
                                <h3 class="text-lg text-red-600">{{ $data->rute->kotaAsal->nama_kota }} ke <br>
                                    <span class="text-4xl font-bold">{{ $data->rute->kotaTujuan->nama_kota }}</span>
                                </h3>
                                <p class="text-sm font-bold mt-16">Tanggal Berangkat -
                                    {{ \Carbon\Carbon::parse($data->tanggal_berangkat)->format('d M Y') }}</p>
                                <p class="text-xl font-bold text-red-500 my-2">IDR
                                    {{ number_format($data->harga, 0, ',', '.') }}</p>
                                <hr>
                                <p class="mt-3">{{ $data->rute->maskapai->nama_maskapai }} |
                                    {{ $data->rute->maskapai->kelas }}</p>
                                <a href="{{ route('detail', $data->id_jadwal) }}"
                                    class="inline-block w-full text-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 mt-4">
                                    Lihat Detail
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>

        <footer class="bg-gray-800 shadow-sm text-white py-12" data-aos="fade-up">
            <div class="max-w-screen-xl mx-auto">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <div class="flex items-center">
                            <svg class="h-8 w-auto text-blue-600" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L3 9L6 10L8 22L12 20L16 22L18 10L21 9L12 2Z" fill="currentColor" />
                                <path d="M12 2V20" stroke="white" stroke-width="2" />
                            </svg>
                            <span class="ml-2 text-xl font-bold text-white">SkyLine</span>
                        </div>
                        <p class="mt-2 text-sm text-white dark:text-gray-400">Platform Pemesanan Tiket Pesawat No.1 di
                            Indonesia</p>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Layanan</h2>
                            <ul class="text-white dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Cari Tiket</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Promo</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Perusahaan</h2>
                            <ul class="text-white dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Karir</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Legal</h2>
                            <ul class="text-white dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Kebijakan Privasi</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Syarat & Ketentuan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-white sm:text-center dark:text-gray-400">© 2025 <a href="/"
                            class="hover:underline">Skyline™</a>. All Rights Reserved.</span>
                </div>
            </div>
        </footer>
    </div>


    <script>
        AOS.init();


        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>

</body>

</html>
