@extends('layouts.perpus')

@section('title', 'Bukti Peminjaman')

@section('content')
<div class="max-w-3xl mx-auto py-10">
  <div class="bg-gray-800 text-white p-8 rounded-2xl shadow-lg">
    <h2 class="text-3xl font-bold text-center mb-8">Bukti Peminjaman Buku</h2>

    <div class="grid grid-cols-1 gap-6">
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Kode Transaksi</span>
        <span>{{ $pinjaman->kode_transaksi ?? '-' }}</span>
      </div>
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Nama Peminjam</span>
        <span>{{ $pinjaman->user->name ?? 'Tidak diketahui' }}</span>
      </div>
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Judul Buku</span>
        <span>{{ $pinjaman->book->judul ?? 'Buku tidak ditemukan' }}</span>
      </div>
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Rak Buku</span>
        <span>{{ $pinjaman->book->lokasi_rak ?? 'Tidak diketahui' }}</span>
      </div>
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Status</span>
        <span>{{ ucfirst($pinjaman->status) }}</span>
      </div>
      <div class="flex justify-between border-b border-gray-700 pb-2">
        <span class="text-gray-400">Tanggal Pinjam</span>
        <span>{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</span>
      </div>
      <div class="flex justify-between pb-2">
        <span class="text-gray-400">Tanggal Kembali</span>
        <span>{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</span>
      </div>
    </div>

    <div class="mt-6 bg-blue-600 text-white text-sm p-4 rounded-lg text-center">
      Tunjukkan bukti ini ke petugas perpustakaan untuk mengambil buku.
    </div>

    <div class="flex justify-center mt-6 space-x-4">
      <a href="{{ route('perpustakaan.pinjaman.download-pdf', $pinjaman->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg text-sm font-semibold">Download PDF</a>
      <a href="{{ route('perpustakaan.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded-lg text-sm font-semibold">Kembali ke Dashboard</a>
    </div>
  </div>
</div>
@endsection
