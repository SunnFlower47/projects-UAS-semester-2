@extends('layouts.perpus')

@section('content')
<section class="max-w-7xl mx-auto px-1 mt-12 sm:px-3 md:px-5">
    <div class="flex justify-between items-center mb-[25px]">
        <h2 class="text-2xl font-bold text-blue-800">Hasil pencarian: "{{ $query }}"</h2>
    </div>

    @if($books->isEmpty())
        <div class="flex items-center justify-center min-h-[45vh]">
            <p class="text-gray-500 italic text-lg text-center">
                Tidak ada buku yang cocok dengan pencarian "{{ $query }}"
            </p>
        </div>
    @else
        <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
            @foreach ($books as $buku)
                <a href="{{ route('perpustakaan.books.show', $buku->id) }}"
                   class="book-card block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">
                    <div class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
                        <img
                        src="{{ $buku->cover ? asset('storage/' . $buku->cover) : asset('img/default-cover.jpg') }}"
                        alt="{{ $buku->judul }}"
                        class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
                        onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
                    </div>

                    <div class="p-3">
                        <p class="font-semibold text-sm md:text-base truncate" title="{{ $buku->judul }}">
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

                        <p class="block text-center mt-2 text-[11px] text-white bg-indigo-500 hover:brightness-110 px-2 py-[2px] rounded-full transition">
                            Lihat Detail
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8 flex justify-center">
            {{ $books->appends(['search' => $query])->links('vendor.pagination.tailwind-custom') }}
        </div>
    @endif
</section>
@endsection
