@extends('layouts.perpus')

@section('content')
<section class="mb-[50px] px-4">
    <div class="flex justify-between items-center mb-[25px]">
        <h2 class="text-2xl font-bold text-white m-0">Hasil pencarian: "{{ $query }}"</h2>
        {{-- <a href="#" class="text-cyan-400 text-base font-medium hover:text-white transition-colors duration-200">Selengkapnya</a> --}}
    </div>

    @if($books->isEmpty())
        <p class="text-gray-400">Tidak ada buku ditemukan.</p>
    @else
        <div class="relative">
    <!-- Panah Kiri -->
    <button onclick="scrollLeft()" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800 bg-opacity-60 hover:bg-opacity-90 p-2 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <!-- Kontainer Buku -->
    <div id="bookContainer" class="flex gap-[22px] overflow-x-auto px-1 py-[10px] max-w-full scrollbar-hide scroll-smooth">
        @foreach ($books as $buku)
            <div class="flex-none w-[160px] bg-gray-800 rounded-lg border-2 border-transparent overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:border-cyan-400 hover:shadow-[0_0_15px_rgba(34,211,238,0.4)]">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul }}" class="w-full h-[230px] object-cover block">
                <div class="p-3">
                    <p class="text-sm text-white mb-1 truncate">{{ $buku->judul }}</p>
                    <p class="text-xs text-gray-300 truncate">{{ $buku->kategori->nama ?? '-' }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Panah Kanan -->
    <button onclick="scrollRight()" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800 bg-opacity-60 hover:bg-opacity-90 p-2 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>

    @endif
</section>
@endsection
