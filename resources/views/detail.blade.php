<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
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
        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Product Detail Card -->
            <div class="bg-white p-6 rounded-lg shadow-md grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Image -->
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $detail->rute->maskapai->logo_maskapai) }}" alt="Product Image" class="rounded-lg shadow-lg">
                </div>

                <!-- Product Details -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $detail->rute->maskapai->nama_maskapai }}</h2>
                    <p class="text-gray-600 text-lg mt-2 font-bold">Price: {{ $detail->harga }}</p>
                    <p class="text-gray-600 text-md mt-2 font-bold">Kapasitas: {{ $detail->kapasitas }}</p>

                    <div class="mt-4">
                        <label class="block font-medium text-gray-700">Rute :</label>
                        <input type="text" value="{{ $detail->rute->kotaAsal->nama_kota }} → {{ $detail->rute->kotaTujuan->nama_kota }}"
                            class="mt-1 w-full p-2 border rounded-lg" readonly>
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-gray-700">Jam Berangkat :</label>
                        <input type="text" value="{{ $detail->waktu_berangkat }}"
                            class="mt-1 w-full p-2 border rounded-lg" readonly>
                    </div>
                    <div class="mt-4">
                        <label class="block font-medium text-gray-700">Jam Tiba</label>
                        <input type="text" value="{{ $detail->waktu_tiba }}" class="mt-1 w-full p-2 border rounded-lg"
                            readonly>
                    </div>

                    <button type="button"
                        class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mt-5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 21">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        Buy now
                    </button>
                    <a href="{{ route('travel') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm mt-5 px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>

</body>

</html>
