<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkyLine - Air Ticket Booking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .ticket-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border-left: 4px solid #3b82f6;
        }
        .flight-icon {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Background Sky Effect -->
        <div class="absolute inset-0 bg-gradient-to-b from-blue-50 to-white opacity-50"></div>

        <div class="relative z-10">
            <header class="bg-white shadow-sm">
                <div class="container mx-auto px-6 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <svg class="h-8 w-auto text-blue-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L3 9L6 10L8 22L12 20L16 22L18 10L21 9L12 2Z" fill="currentColor"/>
                                <path d="M12 2V20" stroke="white" stroke-width="2"/>
                            </svg>
                            <span class="ml-2 text-xl font-bold text-blue-600">SkyLine</span>
                        </div>

                        <!-- Navigation -->
                        @if (Route::has('login'))
                            <nav class="flex items-center space-x-4">
                                @auth
                                    {{-- <a href="{{ url('/dashboard') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 transition">
                                        Dashboard
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="px-3 py-2 text-gray-700 hover:text-blue-600 transition">
                                            Logout
                                        </button>
                                    </form> --}}
                                @else
                                    <a href="{{ route('login') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 transition">
                                        Login
                                    </a>
                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                            Register
                                        </a>
                                    @endif --}}
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </header>

            <main class="container mx-auto px-6 py-12">
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold text-gray-800 mb-4">Your Journey Starts Here</h1>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Book your flights with SkyLine and experience the best in air travel.
                    </p>
                </div>

                <div class="grid gap-8 lg:grid-cols-2">
                    <!-- Flight Search Card -->
                    <div class="ticket-card rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-6">
                                <div class="flight-icon p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Find Your Flight</h2>
                            </div>
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">From</label>
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>Select City</option>
                                            <option>Jakarta (CGK)</option>
                                            <option>Bali (DPS)</option>
                                            <option>Surabaya (SUB)</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">To</label>
                                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>Select City</option>
                                            <option>Jakarta (CGK)</option>
                                            <option>Bali (DPS)</option>
                                            <option>Surabaya (SUB)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Departure</label>
                                        <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Return</label>
                                        <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                                    Search Flights
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Special Offers Card -->
                    <div class="ticket-card rounded-lg shadow-md overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center mb-6">
                                <div class="flight-icon p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Special Offers</h2>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                    <div class="bg-blue-100 p-2 rounded mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Bali Getaway</h3>
                                        <p class="text-sm text-gray-600">Up to 40% off flights to Bali this season</p>
                                    </div>
                                </div>
                                <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                    <div class="bg-blue-100 p-2 rounded mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Early Bird Special</h3>
                                        <p class="text-sm text-gray-600">Book 60 days in advance and save 25%</p>
                                    </div>
                                </div>
                                <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                    <div class="bg-blue-100 p-2 rounded mr-3">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">Flexible Booking</h3>
                                        <p class="text-sm text-gray-600">Free date changes on all flights</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- My Bookings Card (Visible when logged in) -->
                    @auth
                    <div class="ticket-card rounded-lg shadow-md overflow-hidden lg:col-span-2">
                        <div class="p-6">
                            <div class="flex items-center mb-6">
                                <div class="flight-icon p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">My Bookings</h2>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Flight</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-gray-900">CGK → DPS</div>
                                                <div class="text-sm text-gray-500">Garuda Indonesia</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                15 Jun 2023
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Confirmed
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-gray-900">DPS → SUB</div>
                                                <div class="text-sm text-gray-500">Lion Air</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                22 Jun 2023
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </main>

            <footer class="bg-gray-800 shadow-sm text-white py-12">
                <div class="max-w-screen-xl mx-auto">
                    <div class="md:flex md:justify-between">
                        <div class="mb-6 md:mb-0">
                            <div class="flex items-center">
                                {{-- <img src="{{ asset('storage/maskapai/logo.jpg') }}" class="h-8 mr-3" alt="SkyLine Logo" /> --}}
                                <svg class="h-8 w-auto text-blue-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L3 9L6 10L8 22L12 20L16 22L18 10L21 9L12 2Z" fill="currentColor"/>
                                    <path d="M12 2V20" stroke="white" stroke-width="2"/>
                                </svg>
                                <span class="ml-2 text-xl font-bold text-white">SkyLine</span>
                            </div>
                            <p class="mt-2 text-sm text-white dark:text-gray-400">Platform Pemesanan Tiket Pesawat No.1 di Indonesia</p>
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
                        <span class="text-sm text-white sm:text-center dark:text-gray-400">© 2025 <a href="/" class="hover:underline">Skyline™</a>. All Rights Reserved.</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>
