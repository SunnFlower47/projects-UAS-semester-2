@extends('layouts.perpus')

@section('title', 'Histori Peminjaman')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-3xl font-bold text-purple-500 text-center mb-10">Histori Peminjaman Buku</h2>

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
        <input type="text" id="searchHistori"
               placeholder="Cari judul atau kode transaksi..."
               class="w-full max-w-md px-4 py-2 rounded-lg bg-purple-100 text-purple-800 placeholder-purple-400 border border-pink-300 focus:outline-none focus:ring-2 focus:ring-purple-400 transition" />
    </div>

    <!-- Hasil Histori -->
    <div id="histori-results">
        @include('perpustakaan.pinjaman.search-pinjaman', ['pinjamans' => $pinjamans])
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchHistori');

    searchInput.addEventListener('keyup', function () {
        let query = this.value;
        let status = new URLSearchParams(window.location.search).get('status') || '';

        fetch(`/histori/search?q=${encodeURIComponent(query)}&status=${encodeURIComponent(status)}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.text())
        .then(html => {
            document.getElementById('histori-results').innerHTML = html;
        });
    });
});
</script>
@endpush
