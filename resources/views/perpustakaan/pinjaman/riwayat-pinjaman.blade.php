@extends('layouts.perpus')

@section('title', 'riwayat Peminjaman')

@section('content')
<div class="max-w-7xl mx-auto px-1 mt-12 sm:px-3 md:px-5">
    <h2 class="text-3xl font-bold text-purple-500 text-center mb-10">riwayat Peminjaman Buku</h2>

    <!-- Filter & Search -->
    <form method="GET" class="mb-6 flex flex-col md:flex-row md:items-center md:justify-center gap-4 text-sm">
        <label class="text-pink-600 font-medium flex items-center">
            Filter Status:
            <select name="status" onchange="this.form.submit()"
                    class="ml-2 px-3 py-2 rounded-lg bg-pink-100 text-pink-700 border border-purple-200 focus:ring-2 focus:ring-purple-400 transition">
                <option value="">Semua</option>
                <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
            </select>
        </label>
    </form>

    <!-- Search Bar -->
    <div class="mb-6 flex justify-center">
        <input type="text" id="searchriwayat"
               placeholder="Cari judul atau kode transaksi..."
               class="w-full max-w-md px-4 py-2 rounded-lg bg-purple-100 text-purple-800 placeholder-purple-400 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-purple-400 transition" />
    </div>

    <!-- Hasil riwayat -->
    <div id="riwayat-results">
       @include('perpustakaan.pinjaman._search-riwayat', ['pinjamans' => $pinjamans])
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchriwayat');

    searchInput.addEventListener('keyup', function () {
        let query = this.value;
        let status = new URLSearchParams(window.location.search).get('status') || '';

        fetch(`/riwayat/search?q=${encodeURIComponent(query)}&status=${encodeURIComponent(status)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('riwayat-results').innerHTML = html;
        });
    });
});
</script>
@endpush
