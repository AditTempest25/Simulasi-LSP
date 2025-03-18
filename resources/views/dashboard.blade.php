<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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

        <!-- Hero Section -->
        <section class="bg-white dark:bg-gray-900 mt-15" data-aos="fade-up">
            <div class="relative max-w-screen-xl px-4 mx-auto overflow-hidden lg:px-12">
                <div class="aspect-video w-full h-auto rounded-xl overflow-hidden shadow-2xl mt-8">
                    <img src="{{ asset('storage/maskapai/maskapai4.jpg') }}" alt="Travel Hero Image"
                        class="w-full h-full object-cover object-center" loading="lazy">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/60 to-transparent flex items-center">
                        <div class="max-w-2xl px-8 text-white">
                            <h1 class="mb-4 text-3xl font-extrabold leading-tight md:text-4xl lg:text-5xl">
                                Jelajahi Dunia dengan Mudah
                            </h1>
                            <p class="mb-8 text-lg lg:text-xl">
                                Pesan tiket pesawat online dengan cepat dan aman. Dapatkan harga terbaik untuk
                                penerbangan domestik maupun internasional.
                            </p>
                            <div class="flex gap-4">
                                <a href="#"
                                    class="inline-flex items-center px-6 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 lg:text-base">
                                    Cari Penerbangan
                                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="bg-white dark:bg-gray-900 mt-12" data-aos="fade-up">
            <div class="items-center max-w-screen-xl gap-16 px-4 py-8 mx-auto lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Kenapa Memilih
                        Kami?</h2>
                    <p class="mb-4">Sebagai platform pemesanan tiket pesawat terkemuka, kami menyediakan:</p>
                    <ul class="list-disc pl-5 mb-4">
                        <li class="mb-2">Harga kompetitif dengan garansi termurah</li>
                        <li class="mb-2">Kemudahan pembayaran dengan berbagai metode</li>
                        <li class="mb-2">Dukungan pelanggan 24/7</li>
                        <li class="mb-2">Pencarian penerbangan yang cepat dan intuitif</li>
                    </ul>
                    <p>Telah dipercaya oleh lebih dari 1 juta pelanggan untuk perjalanan mereka.</p>
                </div>
                <!-- Images tetap sama --> <img class="rounded-lg" src="{{ asset('storage/maskapai/maskapai3.jpeg') }}"
                    alt="">
            </div>
        </section>



        <!-- Fitur Section -->
        <section class="bg-white dark:bg-gray-900" data-aos="fade-up">
            <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:px-6">
                <div class="max-w-screen-md mb-8 lg:mb-16">
                    <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Kemudahan
                        dalam Satu Platform</h2>
                    <p class="text-gray-500 sm:text-xl dark:text-gray-400">Nikmati pengalaman memesan tiket pesawat yang
                        mudah dan menyenangkan.</p>
                </div>
                <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                    <!-- Fitur 1 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-magnifying-glass text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Pencarian Mudah</h3>
                        <p class="text-gray-500 dark:text-gray-400">Cari penerbangan sesuai preferensi Anda dengan
                            filter lengkap</p>
                    </div>

                    <!-- Fitur 2 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-credit-card text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Pembayaran Aman</h3>
                        <p class="text-gray-500 dark:text-gray-400">Sistem pembayaran terenkripsi dengan berbagai metode
                            pembayaran</p>
                    </div>

                    <!-- Fitur 3 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-headset text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">24/7 Support</h3>
                        <p class="text-gray-500 dark:text-gray-400">Tim customer service siap membantu kapan saja</p>
                    </div>

                    <!-- Fitur 4 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-tag text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Harga Terbaik</h3>
                        <p class="text-gray-500 dark:text-gray-400">Garansi harga termurah dengan price match promise
                        </p>
                    </div>

                    <!-- Fitur 5 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-clock text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Konfirmasi Instan</h3>
                        <p class="text-gray-500 dark:text-gray-400">Dapatkan e-ticket langsung setelah pembayaran</p>
                    </div>

                    <!-- Fitur 6 -->
                    <div>
                        <div
                            class="flex items-center justify-center w-10 h-10 mb-4 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-900">
                            <i class="fa-solid fa-plane text-blue-600"></i>
                        </div>
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Banyak Maskapai</h3>
                        <p class="text-gray-500 dark:text-gray-400">Partner dengan 100+ maskapai penerbangan ternama</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="bg-white dark:bg-gray-900" data-aos="fade-right">
            <div
                class="items-center max-w-screen-xl gap-8 px-4 py-8 mx-auto xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                <img class="w-full dark:hidden rounded-md" src="{{ asset('storage/maskapai/maskapai2.jpeg') }}"
                    alt="Travel Illustration">
                <div class="mt-4 md:mt-0">
                    <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Siap Terbang?
                    </h2>
                    <p class="mb-6 text-gray-500 md:text-lg dark:text-gray-400">Mulai petualangan Anda sekarang! Cari
                        penerbangan terbaik dan dapatkan penawaran spesial untuk anggota baru.</p>
                    <a href="#"
                        class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-blue-900">
                        Pesan Sekarang
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="p-4 bg-white sm:p-6 dark:bg-gray-800" data-aos="fade-up">
            <div class="max-w-screen-xl mx-auto">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="/" class="flex items-center">
                            <img src="{{ asset('storage/maskapai/logo.jpeg') }}" class="h-8 mr-3"
                                alt="SkyLine Logo" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Skyline</span>
                        </a>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Platform Pemesanan Tiket Pesawat No.1
                            di Indonesia</p>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Layanan</h2>
                            <ul class="text-gray-600 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Cari Tiket</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Promo</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Perusahaan
                            </h2>
                            <ul class="text-gray-600 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Karir</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                            <ul class="text-gray-600 dark:text-gray-400">
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
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="/"
                            class="hover:underline">Skyline™</a>. All Rights Reserved.
                    </span>
                    <!-- Social media links tetap sama -->
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
