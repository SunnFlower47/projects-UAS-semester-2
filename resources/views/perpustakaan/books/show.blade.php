@extends('layouts.perpus')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
  <div class="book-header">
    <img src="{{ $book->cover ? asset($book->cover) : asset('img/default-cover.jpg') }}" alt="{{ $book->judul }}">
    <div class="book-info">
      <h2>{{ $book->judul }}</h2>
      <p>{{ $book->penulis }}</p>
      <div class="stars">★★★★☆ {{ number_format($book->rating ?? 4.5, 1) }}</div>
      <a href="{{ route('perpustakaan.pinjaman.create', $book->id) }}" class="btn-pinjam">Pinjam</a>
    </div>
  </div>

  <div class="tab-menu">
    <div class="tab-link active" data-tab="deskripsi">Deskripsi</div>
    <div class="tab-link" data-tab="detail">Detail</div>
  </div>

  <div id="deskripsi" class="tab-content active">
    <p>{{ $book->deskripsi ?? 'Belum ada deskripsi untuk buku ini.' }}</p>
  </div>

 <div id="detail" class="tab-content">
  <table class="detail-table">
    <tr><td class="label">Author</td><td>{{ $book->pengarang }}</td></tr>
    <tr><td class="label">Audio read by</td><td>-</td></tr> {{-- Karena nggak ada di DB --}}
    <tr><td class="label">Language</td><td>{{ ucfirst($book->bahasa) }}</td></tr>
    <tr><td class="label">Genre</td><td>{{ $book->kategori->nama ?? '-' }}</td></tr>
    <tr><td class="label">Publisher</td><td>{{ $book->penerbit }}</td></tr>
    <tr><td class="label">Publication date</td><td>{{ $book->tahun }}</td></tr>
    <tr><td class="label">Publication place</td><td>-</td></tr> {{-- Tidak ada di DB --}}
    <tr><td class="label">ISBN</td><td>{{ $book->isbn ?? '-' }}</td></tr>
    <tr><td class="label">Jumlah Halaman</td><td>{{ $book->jumlah_halaman ?? '-' }}</td></tr>
    <tr><td class="label">Lokasi Rak</td><td>{{ $book->lokasi_rak ?? '-' }}</td></tr>
    <tr><td class="label">Stok</td><td>{{ $book->stok }}</td></tr>
  </table>
</div>

</div>
@endsection


@push('styles')
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #111827;
    color: #e0e0e0;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 1000px;
    margin: 40px auto;
    background-color: #1f2937;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: none;
  }

  .book-header {
    display: flex;
    gap: 30px;
    align-items: flex-start;
  }

  .book-header img {
    width: 200px;
    border-radius: 8px;
    border: 1px solid #4b5563;
  }

  .book-info {
    flex: 1;
  }

  .book-info h2 {
    margin: 0 0 5px 0;
    font-size: 28px;
    color: #ffffff;
  }

  .book-info p {
    color: #9ca3af;
    margin: 5px 0;
    font-size: 16px;
  }

  .stars {
    color: #ffc107;
    font-size: 20px;
  }

  .btn-pinjam {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 24px;
    background-color: #22d3ee;
    color: #111827;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.2s ease;
  }

  .btn-pinjam:hover {
    background-color: #67e8f9;
  }

  .tab-menu {
    display: flex;
    gap: 20px;
    border-bottom: 2px solid #374151;
    margin-top: 40px;
  }

  .tab-link {
    padding: 10px 0;
    cursor: pointer;
    font-weight: bold;
    color: #9ca3af;
    border-bottom: 3px solid transparent;
    transition: color 0.2s, border-color 0.2s;
  }

  .tab-link.active {
    border-bottom-color: #22d3ee;
    color: #22d3ee;
  }

  .tab-content {
    display: none;
    padding-top: 20px;
    line-height: 1.6;
  }

  .tab-content.active {
    display: block;
  }

  .tab-content p {
    color: #d1d5db;
  }

  table.detail-table {
    width: 100%;
    margin-top: 10px;
    border-collapse: collapse;
  }

  table.detail-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #374151;
  }

  table.detail-table tr:last-child td {
    border-bottom: none;
  }

  table.detail-table td.label {
    font-weight: bold;
    width: 30%;
    color: #ffffff;
  }
</style>
@endpush

@push('scripts')
<script>
  const tabLinks = document.querySelectorAll('.tab-link');
  const tabContents = document.querySelectorAll('.tab-content');

  tabLinks.forEach(link => {
    link.addEventListener('click', () => {
      tabLinks.forEach(l => l.classList.remove('active'));
      tabContents.forEach(c => c.classList.remove('active'));

      link.classList.add('active');
      document.getElementById(link.dataset.tab).classList.add('active');
    });
  });
</script>
@endpush
