<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>404 - Page Not Found</title>
  <!-- Link CDN Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white shadow-md rounded-md overflow-hidden">
    <!-- Bagian Kiri (Teks) -->
    <div class="flex flex-col justify-center px-8 py-16 md:w-1/2">
      <h1 class="text-5xl font-bold text-indigo-600 mb-4">404</h1>
      <h2 class="text-2xl font-semibold mb-2">Page not found</h2>
      <p class="text-gray-600 mb-6">
        Maaf, kami tidak dapat menemukan halaman yang Anda cari.
      </p>
      <a
        href="/"
        class="inline-block bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700 transition-colors"
      >
        Kembali ke Beranda
      </a>
    </div>

    <!-- Bagian Kanan (Gambar) -->
    <div class="relative md:w-1/2">
      <img
        src="https://images.unsplash.com/photo-1546975495-6f3c87feca71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1050&q=80"
        alt="Desert"
        class="w-full h-full object-cover"
      />
    </div>
  </div>
</body>
</html>
