<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>403 - Forbidden</title>
    <!-- Link CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-md shadow-md flex flex-col md:flex-row items-center gap-8">
        <!-- Gambar Stop Sign dengan Tangan -->
        <div class="flex-shrink-0">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png" alt="Stop sign with hand"
                class="w-40 h-40 object-contain" />
        </div>
        <!-- Bagian Teks -->
        <div class="text-center md:text-left">
            <h1 class="text-3xl font-bold text-purple-700 uppercase tracking-wider">
                Forbidden
            </h1>
            <h2 class="text-6xl font-extrabold text-orange-500 mt-2 mb-4">
                403
            </h2>
            <p class="text-gray-600 mb-6">
                We are sorry, but you do not have access to this page or resource.
            </p>
            <a href="/"
                class="inline-block bg-red-500 text-white px-5 py-2 rounded-md hover:bg-red-600 transition-colors">
                Back to Home Page
            </a>
        </div>
    </div>
</body>

</html>
