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

        <section class="bg-white dark:bg-gray-900" data-aos="fade-up">
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
                            {{-- <a href="#"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                CARI PENERBANGAN</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <div class="bg-brown-700 py-6" data-aos="fade-up">
            <h2 class="text-center text-black text-xl font-bold">
                Gas Pesen Pesawat Sekarang Leeeeeeee!!!
            </h2>
            <div class="container mx-auto max-w-screen-lg grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6 px-4">
                @foreach ($jadwal as $data)
                <div class="bg-white shadow-md rounded-lg p-4 h-full">
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
        </div>


        <x-footer></x-footer>
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
