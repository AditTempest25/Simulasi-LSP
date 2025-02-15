<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="text-center py-6 bg-blue-500 text-white">
        <h1 class="text-2xl font-bold">✨ Cek yang populer di JetKet! 🌟</h1>
        <nav class="mt-4">
            <div class="flex justify-center space-x-4">
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Atraksi</button>
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Hotel</button>
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Vila & Apt.</button>
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Event</button>
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Tempat bermain</button>
                <button class="px-4 py-2 bg-white text-blue-500 rounded-lg shadow">Spa & Kecantikan</button>
            </div>
        </nav>
    </header>
    
    <section class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="waterpark.jpg" alt="Pondok Indah Waterpark" class="w-full rounded-lg">
            <h3 class="mt-2 font-semibold">Pondok Indah Waterpark</h3>
            <p class="text-red-500 font-bold">IDR 110.000</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="trans-snow.jpg" alt="Trans Snow World Bekasi" class="w-full rounded-lg">
            <h3 class="mt-2 font-semibold">Trans Snow World Bekasi</h3>
            <p class="text-red-500 font-bold"><del class="text-gray-500">IDR 150.000</del> IDR 80.000</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="floating-market.jpg" alt="Floating Market Lembang" class="w-full rounded-lg">
            <h3 class="mt-2 font-semibold">Floating Market Lembang</h3>
            <p class="text-red-500 font-bold"><del class="text-gray-500">IDR 40.000</del> IDR 34.500</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="waterboom.jpg" alt="Waterboom Lippo Cikarang" class="w-full rounded-lg">
            <h3 class="mt-2 font-semibold">Waterboom Lippo Cikarang</h3>
            <p class="text-red-500 font-bold"><del class="text-gray-500">IDR 40.000</del> IDR 30.000</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="museum-macan.jpg" alt="Museum MACAN" class="w-full rounded-lg">
            <h3 class="mt-2 font-semibold">Museum MACAN</h3>
            <p class="text-red-500 font-bold">IDR 70.000</p>
        </div>
    </section>
    
    <footer class="text-center py-6 bg-blue-500 text-white mt-6">
        <p class="text-lg font-semibold">Kuy, cek promo sebelum bepergian!</p>
    </footer>
</body>
</html>
