@extends('layouts.perpus')

@section('title', 'Bukti Peminjaman')

@section('content')
<div class="max-w-3xl mx-auto py-14 px-6">
  <div class="bg-blue-50 text-blue-900 p-8 rounded-2xl shadow-md border border-blue-100">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Bukti Peminjaman Buku</h2>

    <div class="grid grid-cols-1 gap-6 text-sm">
      @php
          $bukti = [
              'Kode Transaksi' => $pinjaman->kode_transaksi ?? '-',
              'Nama Peminjam' => $pinjaman->user->name ?? 'Tidak diketahui',
              'Judul Buku' => $pinjaman->book->judul ?? 'Buku tidak ditemukan',
              'Rak Buku' => $pinjaman->book->lokasi_rak ?? 'Tidak diketahui',
              'Status' => ucfirst($pinjaman->status),
              'Tanggal Pinjam' => \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y'),
              'Tanggal Kembali' => \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y'),
          ];
      @endphp

      @foreach ($bukti as $label => $value)
        <div class="flex justify-between border-b border-blue-200 pb-2">
          <span class="text-blue-500 font-medium">{{ $label }}</span>
          <span class="text-right">{{ $value }}</span>
        </div>
      @endforeach
    </div>

    <div class="mt-8 bg-yellow-100 text-yellow-800 text-sm p-4 rounded-lg text-center border border-yellow-200">
      Tunjukkan bukti ini ke petugas perpustakaan untuk mengambil buku.
    </div>

    <div class="flex justify-center mt-8 gap-4">
      <a href="{{ route('perpustakaan.pinjaman.download-pdf', $pinjaman->id) }}"
         class="bg-green-400 hover:bg-green-500 text-white px-6 py-2 rounded-lg font-semibold text-sm transition duration-200">
        Download PDF
      </a>
      <a href="{{ route('perpustakaan.index') }}"
         class="bg-blue-300 hover:bg-blue-400 text-white px-6 py-2 rounded-lg font-semibold text-sm transition duration-200">
        Kembali ke Dashboard
      </a>
    </div>
  </div>
</div>
@endsection
