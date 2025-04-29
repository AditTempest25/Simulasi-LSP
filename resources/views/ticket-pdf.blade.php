<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .ticket-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #3f51b5;
        }

        .header h1 {
            font-size: 32px;
            font-weight: 600;
        }

        .header h2 {
            font-size: 24px;
            font-weight: 400;
            color: #3f51b5;
        }

        .ticket-info {
            padding: 20px;
            border-radius: 10px;
            background-color: #f1f1f1;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #555;
            width: 180px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-value {
            color: #333;
            font-size: 14px;
            text-align: right;
        }

        .barcode {
            text-align: center;
            margin-top: 30px;
        }

        .barcode p {
            font-size: 16px;
            font-weight: 600;
            color: #555;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }

        .footer p {
            margin: 5px 0;
        }

        .footer p:first-child {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <div class="header">
            <div class="header" style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <!-- Logo SVG -->
                <svg style="height: 40px; width: 40px; color: #3b82f6;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L3 9L6 10L8 22L12 20L16 22L18 10L21 9L12 2Z" fill="currentColor" />
                    <path d="M12 2V20" stroke="white" stroke-width="2" />
                </svg>
                <!-- Teks Judul -->
                <h1 style="font-size: 32px; font-weight: 600; color: #3f51b5; margin: 0;">SkyLine Penerbangan</h1>
            </div>
            <h2>{{ $ticket->nama_maskapai }}</h2>


        </div>

        <div class="ticket-info">
            <div class="info-row">
                <div class="info-label">Nomor Tiket:</div>
                <div class="info-value">{{ $ticket->orderTiket->no_struk }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Atas Nama:</div>
                <div class="info-value">{{ $ticket->name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Rute:</div>
                <div class="info-value">{{ $ticket->kota_asal }} Ke {{ $ticket->kota_tujuan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Waktu:</div>
                <div class="info-value">{{ $ticket->waktu_berangkat }} - {{ $ticket->waktu_tiba }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jumlah Tiket:</div>
                <div class="info-value">{{ $ticket->total_tiket }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Total Harga:</div>
                <div class="info-value">Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Penerbangan:</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($ticket->tanggal_transaksi)->format('d F Y') }}</div>
            </div>
        </div>

        <div class="barcode">
            <p>Scan barcode untuk verifikasi</p>
            <svg id="barcode"></svg> <!-- Barcode akan digenerate di sini -->
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami</p>
            <p>Harap tiba di bandara minimal 2 jam sebelum keberangkatan</p>
        </div>
    </div>

    <script>
        JsBarcode("#barcode", "{{ $ticket->orderTiket->no_struk }}", {
            format: "CODE128", // Format barcode, bisa diganti sesuai keinginan
            lineColor: "#0aa", // Warna garis barcode
            width: 4, // Lebar garis
            height: 100, // Tinggi barcode
            displayValue: true, // Menampilkan nilai di bawah barcode
            fontSize: 18, // Ukuran font untuk teks di bawah barcode
        });
    </script>
</body>

</html>
