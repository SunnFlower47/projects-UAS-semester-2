@extends('layouts.perpus')

@section('content')
<section class="mb-[50px] px-4 max-w-6xl mx-auto pt-24">
    <div class="flex justify-between items-center mb-[25px]">
        <h2 class="text-2xl font-bold text-blue-800 m-0">Hasil pencarian: "{{ $query }}"</h2>
    </div>

    @if($books->isEmpty())
        <div class="flex items-center justify-center min-h-[45vh]">
        <p class="text-gray-500 italic text-lg text-center">
            Tidak ada buku yang cocok dengan pencarian "{{ $query }}"
        </p>
    </div>
    @else
    <div class="relative">
        <!-- Panah Kiri -->
        <button onclick="scrollBookContainer('left')" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-indigo-200 hover:bg-indigo-300 p-2 rounded-full shadow-md transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

        <!-- Kontainer Buku -->
        <div id="bookContainer"
    class="flex gap-5 px-4 py-3 overflow-x-auto max-w-full scroll-smooth scrollbar-hide whitespace-nowrap snap-x snap-mandatory"
    style="scroll-behavior: smooth; -webkit-overflow-scrolling: touch;">

            @foreach ($books as $buku)
                <div class="flex-none w-[160px] bg-pink-100 rounded-lg border-2 border-transparent overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:border-blue-300 hover:shadow-[0_0_15px_rgba(147,197,253,0.5)]">
                    <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul }}" class="w-full h-[230px] object-cover block">
                    <div class="p-3">
                        <p class="text-sm text-indigo-800 mb-1 truncate font-medium">{{ $buku->judul }}</p>
                        <p class="text-xs text-indigo-500 truncate">{{ $buku->kategori->nama ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Panah Kanan -->
        <button onclick="scrollBookContainer('right')" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-indigo-200 hover:bg-indigo-300 p-2 rounded-full shadow-md transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
    @endif
</section>
@endsection

@push('scripts')
<script>
    function scrollBookContainer(direction) {
        const container = document.getElementById('bookContainer');
        const scrollAmount = 200; // Adjust the scroll amount as needed

        if (direction === 'left') {
            container.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        } else if (direction === 'right') {
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    }
</script>
@endpush

