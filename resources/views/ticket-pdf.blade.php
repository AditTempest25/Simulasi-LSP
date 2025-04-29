<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ticket-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .ticket-info {
            border: 2px dashed #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        .info-row {
            display: flex;
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
            width: 150px;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="ticket-container">
        <div class="header">
            <h1>SkyLine Penerbangan</h1>
            <h2>{{ $ticket->nama_maskapai }}</h2>
        </div>

        <div class="ticket-info">
            <div class="info-row">
                <div class="info-label">Nomor Tiket:</div>
                <div>{{ $ticket->orderTiket->no_struk }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Atas Nama:</div>
                <div>{{ $ticket->name }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Rute:</div>
                <div>{{ $ticket->kota_asal }} Ke {{ $ticket->kota_tujuan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Waktu:</div>
                <div>{{ $ticket->waktu_berangkat }} - {{ $ticket->waktu_tiba }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Jumlah Tiket:</div>
                <div>{{ $ticket->total_tiket }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Total Harga:</div>
                <div>Rp {{ number_format($ticket->total_harga, 0, ',', '.') }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Penerbangan:</div>
                <div>{{ \Carbon\Carbon::parse($ticket->tanggal_transaksi)->format('d F Y') }}</div>
            </div>
        </div>

        <div class="barcode">
            <p>Scan barcode untuk verifikasi</p>
            <!-- You can add a real barcode generator here if needed -->
            <div style="font-family: 'Libre Barcode 128', cursive; font-size: 40px;">
                *{{ $ticket->orderTiket->no_struk }}*
            </div>
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami</p>
            <p>Harap tiba di bandara minimal 2 jam sebelum keberangkatan</p>
        </div>
    </div>
</body>

</html>
