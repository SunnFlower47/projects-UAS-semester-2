@extends('layouts.perpus')

@section('title', 'Semua Buku')

@section('content')
<style>
.book-card {
  background: linear-gradient(135deg, #d7f0f4, #fbe0f5);
  border-radius: 0.875rem;
  border: 2px solid transparent;
  animation: fadeScaleIn 0.5s ease forwards;
  transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.book-card:hover {
  background: linear-gradient(135deg, #e0c7da, #defcf9, #e9e4d3);
  box-shadow: 0 8px 24px rgba(255, 189, 245, 0.3);
  transform: translateY(-5px) scale(1.06);
}


@keyframes fadeScaleIn {
  0% {
    opacity: 0;
    transform: scale(0.95);
  }
  100% {
    opacity: 1;
    transform: scale(1);
  }
}

</style>

<div class="max-w-7xl mx-auto px-1 mt-12 sm:px-3 md:px-5">

  <h2 class="text-2xl md:text-3xl font-bold text-blue-900 mb-8 text-center">Semua Koleksi Buku</h2>

  <form action="{{ route('perpustakaan.books.daftar_buku') }}" method="GET"
    class="mb-8 flex flex-col md:flex-row items-center justify-center gap-3 px-2">

    {{-- Filter Kategori --}}
    <div>
      <label for="kategori" class="sr-only">Kategori</label>
      <select name="kategori" id="kategori"
        class="px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 min-w-[180px]">
        <option value="">📂 Semua Kategori</option>
        @foreach ($allKategori as $kategori)
          <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Filter Genre --}}
    <div>
      <label for="genre" class="sr-only">Genre</label>
      <select name="genre" id="genre"
        class="px-3 py-2 text-sm rounded-lg border border-pink-200 bg-pink-50 text-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-300 min-w-[180px]">
        <option value="">🎨 Semua Genre</option>
        @foreach ($allGenre as $genre)
          @if($genre)
            <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
              {{ ucfirst($genre) }}
            </option>
          @endif
        @endforeach
      </select>
    </div>

    {{-- Tombol --}}
    <button type="submit"
      class="px-5 py-2 bg-gradient-to-r from-pink-300 to-blue-300 hover:from-pink-400 hover:to-blue-400 text-white text-sm rounded-lg transition font-semibold shadow-md">
      ✨ Filter
    </button>
  </form>

  @php
    $colors = ['bg-pink-400', 'bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-yellow-500', 'bg-red-400', 'bg-amber-500'];
  @endphp

  @if ($books->count() > 0)
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3 md:gap-4">
      @foreach ($books as $buku)
        @php $randomColor = $colors[array_rand($colors)]; @endphp

        <a href="{{ route('perpustakaan.books.show', $buku->id) }}"
          class="book-card w-40 md:w-48 block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">

          <div class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
            <img
              src="{{ $buku->cover ? asset('storage/' . $buku->cover) : asset('img/default-cover.jpg') }}"
              alt="{{ $buku->judul }}"
              class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
              onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
          </div>

          <div class="p-3">
            <p class="book-title font-semibold text-sm md:text-base truncate w-full" title="{{ $buku->judul }}">
              {{ $buku->judul }}
            </p>

            <div class="flex gap-1 mt-1">
              <span class="text-[10px] bg-cyan-100 text-purple-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                {{ $buku->kategori->nama ?? '-' }}
              </span>
                <span class="text-[10px] bg-pink-100 text-purple-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->genre ?? '-' }}">
                    {{ $buku->genre ?? '-' }}
                </span>
            </div>

            <p class="block text-center mt-2 text-[11px] text-white {{ $randomColor }} hover:brightness-110 px-2 py-[2px] rounded-full transition">
              Lihat Detail
            </p>
          </div>
        </a>
      @endforeach
    </div>

    <div class="mt-20 mb-10">
      {{ $books->links('vendor.pagination.tailwind-custom') }}
    </div>
  @else
    <p class="text-center text-gray-600 mt-12">Buku tidak ditemukan, sayang~ 🥺</p>
  @endif
</div>
@endsection
