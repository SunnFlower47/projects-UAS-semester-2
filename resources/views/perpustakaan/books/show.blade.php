@extends('layouts.perpus')

@section('title', 'Detail Buku')

@section('content')
<div class="max-w-5xl mx-auto mt-12 mb-12 bg-white rounded-2xl p-6 md:p-10 shadow-md border border-pink-100">
  <div class="flex flex-col md:flex-row gap-8">
    <img src="{{ $book->cover ? asset($book->cover) : asset('img/default-cover.jpg') }}"
         alt="{{ $book->judul }}"
         class="w-48 h-auto rounded-xl border-2 border-purple-200 shadow-sm">

    <div class="flex-1">
      <h2 class="text-3xl font-bold text-purple-700">{{ $book->judul }}</h2>
      <p class="text-pink-600 text-lg mt-1">{{ $book->penulis }}</p>
      <div class="text-yellow-400 text-lg mt-2">★★★★☆ {{ number_format($book->rating ?? 4.5, 1) }}</div>
      <a href="{{ route('perpustakaan.pinjaman.create', $book->id) }}"
         class="inline-block mt-4 px-6 py-2 bg-cyan-200 text-gray-800 font-semibold rounded-lg hover:bg-cyan-300 transition">
         Pinjam
      </a>
      <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
  <div class="flex items-center gap-2">
    <span class="inline-block w-4 h-4 bg-pink-200 rounded-full"></span>
    <span><strong>Kategori:</strong> {{ $book->kategori->nama ?? '-' }}</span>
  </div>
  <div class="flex items-center gap-2">
    <span class="inline-block w-4 h-4 bg-yellow-200 rounded-full"></span>
    <span><strong>Penulis:</strong> {{ $book->pengarang ?? '-' }}</span>
  </div>
  <div class="flex items-center gap-2">
    <span class="inline-block w-4 h-4 bg-blue-200 rounded-full"></span>
    <span><strong>Lokasi Rak:</strong> {{ $book->lokasi_rak ?? '-' }}</span>
  </div>
  <div class="flex items-center gap-2">
    <span class="inline-block w-4 h-4 bg-green-200 rounded-full"></span>
    <span><strong>Stok:</strong> {{ $book->stok ?? '-' }}</span>
  </div>
</div>


    </div>
  </div>

  {{-- Tab Menu --}}
  <div class="flex gap-6 mt-10 border-b-2 border-pink-100">
    <div class="tab-link text-pink-400 font-semibold py-2 cursor-pointer border-b-4 border-cyan-300 active">Deskripsi</div>
    <div class="tab-link text-pink-400 font-semibold py-2 cursor-pointer">Detail</div>
  </div>

  {{-- Tab Content --}}
  <div class="tab-content mt-6 mb-5">
    <p class="text-gray-700">{{ $book->deskripsi ?? 'Belum ada deskripsi untuk buku ini.' }}</p>
  </div>

  <div class="tab-content hidden mt-6 ">
    <table class="w-full text-sm text-left">
      <tbody class="text-gray-700">
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 w-1/3 py-2">Author</td><td>{{ $book->pengarang }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Audio read by</td><td>-</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Language</td><td>{{ ucfirst($book->bahasa) }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Genre</td><td>{{ $book->kategori->nama ?? '-' }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Publisher</td><td>{{ $book->penerbit }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Publication date</td><td>{{ $book->tahun }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Publication place</td><td>-</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">ISBN</td><td>{{ $book->isbn ?? '-' }}</td></tr>
        <tr class="border-b border-pink-100"><td class="font-bold text-purple-600 py-2">Jumlah Halaman</td><td>{{ $book->jumlah_halaman ?? '-' }}</td></tr>
        <tr><td class="font-bold text-purple-600 py-2">Lokasi Rak</td><td>{{ $book->lokasi_rak ?? '-' }}</td></tr>
        <tr><td class="font-bold text-purple-600 py-2">Stok</td><td>{{ $book->stok }}</td></tr>
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const tabs = document.querySelectorAll('.tab-link');
  const contents = document.querySelectorAll('.tab-content');

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('border-b-4', 'border-cyan-300', 'text-cyan-500', 'active'));
      contents.forEach(c => c.classList.add('hidden'));

      tab.classList.add('border-b-4', 'border-cyan-300', 'text-cyan-500', 'active');
      contents[i].classList.remove('hidden');
    });
  });
</script>
@endpush
