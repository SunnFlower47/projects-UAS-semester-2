<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Peminjaman</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 8px; border-bottom: 1px solid #ccc; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Bukti Peminjaman Buku</h2>
    <table>
        <tr><th>Kode Transaksi</th><td>{{ $pinjaman->kode_transaksi }}</td></tr>
        <tr><th>Nama Peminjam</th><td>{{ $pinjaman->user->name }}</td></tr>
        <tr><th>Judul Buku</th><td>{{ $pinjaman->book->judul ?? 'Buku tidak ditemukan' }}</td></tr>
        <tr><th>Rak</th><td>{{ $pinjaman->book->rak ?? 'Tidak diketahui' }}</td></tr>
        <tr><th>Status</th><td>{{ ucfirst($pinjaman->status) }}</td></tr>
        <tr><th>Tanggal Pinjam</th><td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</td></tr>
        <tr><th>Tanggal Kembali</th><td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</td></tr>
    </table>
</body>
</html>
