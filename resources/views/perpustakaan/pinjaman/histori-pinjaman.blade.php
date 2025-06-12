@extends('layouts.perpus')

@section('title', 'Histori Peminjaman')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    <h2 class="text-3xl font-bold text-white text-center mb-10">Histori Peminjaman Buku</h2>

    <!-- Filter & Search -->
    <form method="GET" class="mb-6 flex flex-wrap gap-4 justify-center">
        <label class="text-white text-sm font-medium">
            Filter Status:
            <select name="status" onchange="this.form.submit()" class="ml-2 px-3 py-1 rounded bg-gray-700 text-white">
                <option value="">Semua</option>
                <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
            </select>
        </label>
    </form>

    <div class="mb-6 flex justify-center">
        <input type="text" id="searchHistori" placeholder="Cari judul atau kode transaksi..."
               class="w-full max-w-md px-4 py-2 rounded-lg bg-gray-700 text-white focus:outline-none" />
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
