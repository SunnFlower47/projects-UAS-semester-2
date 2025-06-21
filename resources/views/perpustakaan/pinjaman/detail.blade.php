@extends('layouts.perpus')

@section('content')
<section class="py-12">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <h2 class="text-3xl font-semibold text-purple-500 mb-8 flex items-center gap-2">
      <x-heroicon-o-document-text class="w-7 h-7 text-purple-300" />
      Detail Pinjaman Buku
    </h2>

    <!-- Card Utama -->
    <div class="bg-transparent backdrop-blur-md rounded-3xl border border-purple-100 shadow-lg p-10">
      <div class="flex flex-col lg:flex-row gap-10">

        <!-- Cover Buku -->
        <img src="{{ asset('storage/' . $pinjaman->book->cover) }}" alt="Cover Buku"
             class="w-48 h-72 object-cover rounded-xl border border-gray-200 shadow-sm min-w-[192px]">

        <!-- Informasi Buku -->
        <div class="flex-1 space-y-4">
          <h3 class="text-2xl font-bold text-purple-600">{{ $pinjaman->book->judul }}</h3>

          <p class="text-sm text-gray-700">
            Pengarang: <strong>{{ $pinjaman->book->pengarang }}</strong>
          </p>

          <p class="text-sm text-gray-700">
            Kategori:
            <span class="bg-purple-100 text-purple-500 px-2 py-1 rounded text-xs">
              {{ $pinjaman->book->kategori->nama }}
            </span>
          </p>

          <p class="text-sm text-gray-700">
            Genre:
            <span class="bg-pink-100 text-pink-500 px-2 py-1 rounded text-xs">
              {{ $pinjaman->book->genre ?? '-' }}
            </span>
          </p>

          <!-- Info Pinjaman -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-4">
            <div>
              <p class="text-xs text-gray-400 uppercase mb-1">Kode Pinjaman</p>
              <p class="text-sm font-medium text-gray-800">{{ $pinjaman->kode_transaksi }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-400 uppercase mb-1">Lokasi Rak</p>
              <p class="text-sm font-medium text-gray-800">Rak {{ $pinjaman->book->lokasi_rak ?? '-' }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-400 uppercase mb-1">Tanggal Pinjam</p>
              <p class="text-sm font-medium text-gray-800">{{ $pinjaman->tanggal_pinjam->translatedFormat('d F Y') }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-400 uppercase mb-1">Jatuh Tempo</p>
              <p class="text-sm font-medium text-gray-800">{{ $pinjaman->tanggal_kembali->translatedFormat('d F Y') }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-400 uppercase mb-1">Status</p>
              @php
                $statusColor = match($pinjaman->status) {
                    'terlambat' => 'red',
                    'dikembalikan' => 'green',
                    'menunggu_validasi' => 'blue',
                    default => 'yellow',
                };
              @endphp
              <p class="text-sm font-medium text-{{ $statusColor }}-600">{{ ucfirst($pinjaman->status) }}</p>
            </div>
          </div>

          <!-- Tombol Download -->
          <div class="pt-6 flex gap-3 flex-wrap">
            <a href="{{ route('perpustakaan.pinjaman.download-pdf', $pinjaman->id) }}"
               onclick="showLoader()"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-400 text-white text-sm font-semibold rounded-lg hover:bg-purple-500 transition">
              <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
              Unduh Bukti PDF Peminjaman
            </a>

            @if(in_array($pinjaman->status, ['dipinjam', 'terlambat']))
            <form id="form-pengembalian"
                  action="{{ route('perpustakaan.pinjaman.pengembalian.ajukan', $pinjaman->id) }}"
                  method="POST"
                  class="inline">
              @csrf
              <button type="button"
                      onclick="confirmPengembalian()"
                      class="inline-flex items-center gap-2 px-5 py-2.5 bg-pink-500 text-white text-sm font-semibold rounded-lg hover:bg-pink-600 transition">
                <x-heroicon-o-arrow-uturn-left class="w-5 h-5" />
                Ajukan Pengembalian
              </button>
            </form>
            @endif
          </div>

        </div>
      </div>
    </div>

    <!-- Kembali ke Riwayat -->
    <div class="mt-8">
      <a href="{{ route('perpustakaan.pinjaman.riwayat-pinjaman') }}"
         class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-100 to-purple-200 text-purple-700 text-sm font-semibold rounded-full shadow hover:from-purple-200 hover:to-purple-300 transition duration-300">
        <svg xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24"
             stroke-width="1.5"
             stroke="currentColor"
             class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 15.75L3.75 10.5 9 5.25M3.75 10.5h13.5A2.25 2.25 0 0120.25 12.75v6" />
        </svg>
        Kembali ke riwayat pinjaman
      </a>
    </div>

  </div>
</section>
@endsection

@push('scripts')
<script>
  function confirmPengembalian() {
    Swal.fire({
  title: 'Ajukan Pengembalian?',
  text: "Pastikan kamu sudah membawa buku ke perpustakaan dan membawa bukti peminjaman sebagai syarat validasi.",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#8b5cf6',
  cancelButtonColor: '#e5e7eb',
  confirmButtonText: 'Ya, ajukan!',
  cancelButtonText: 'Batal',
}).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('form-pengembalian').submit();
      }
    });
  }
</script>
@endpush
