<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Peminjaman</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #fdfdfd;
            color: #333;
            font-size: 13px;
            padding: 30px;
        }

        h2 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f9fafb;
            border: 1px solid #cbd5e0;
        }

        th {
            background-color: #e0f2fe;
            color: #1e3a8a;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #cbd5e0;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .note {
            margin-top: 40px;
            font-size: 12px;
            background-color: #fef9c3;
            color: #92400e;
            padding: 10px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <h2>Bukti Peminjaman Buku</h2>

    <table>
        <tr><th>Kode pinjaman</th><td>{{ $pinjaman->kode_transaksi }}</td></tr>
        <tr><th>Nama Peminjam</th><td>{{ $pinjaman->user->name }}</td></tr>
        <tr><th>Judul Buku</th><td>{{ $pinjaman->book->judul ?? 'Buku tidak ditemukan' }}</td></tr>
        <tr><th>Rak</th><td>{{ $pinjaman->book->lokasi_rak ?? 'Tidak diketahui' }}</td></tr>
        <tr><th>Tanggal Pinjam</th><td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</td></tr>
        <tr><th>Tanggal Kembali</th><td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</td></tr>
    </table>

    <div class="note">
        Harap tunjukkan bukti ini kepada petugas perpustakaan untuk pengambilan buku. Simpan dokumen ini sebagai arsip pribadi.
    </div>
</body>
</html>
