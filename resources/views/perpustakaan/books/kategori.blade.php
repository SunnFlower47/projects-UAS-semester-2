@extends('layouts.perpus')

@section('content')
<section class="px-4 pt-24 max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold text-pink-700 mb-6">Kategori: {{ $kategori->nama }}</h2>

    @if($books->isEmpty())
        <p class="text-gray-500 italic">Tidak ada buku dalam kategori ini.</p>
    @else
       <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
    @foreach($books as $buku)
        <div class="bg-pink-100 rounded-lg border-2 border-transparent overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:border-blue-300 hover:shadow-[0_0_15px_rgba(147,197,253,0.5)]">
            <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->judul }}" class="w-full h-[230px] object-cover block">
            <div class="p-3">
                <p class="text-sm text-indigo-800 mb-1 truncate font-medium">{{ $buku->judul }}</p>
                <p class="text-xs text-indigo-500 truncate">{{ $buku->kategori->nama ?? '-' }}</p>
            </div>
        </div>
    @endforeach
</div>

        <!-- PAGINATION -->
        <div class="pagination mt-8 mb-4">
            {{ $books->links('vendor.pagination.tailwind-custom') }}
        </div>
    @endif
</section>

</section>
@endsection
