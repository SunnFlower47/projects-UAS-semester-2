@if(isset($pinjamans) && $pinjamans->count())
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 sm:gap-3 md:gap-4">
    @foreach ($pinjamans as $pinjaman)
        <a href="{{ route('perpustakaan.pinjaman.detail', $pinjaman->id) }}"
           class="book-card w-full block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">
            <!-- Cover -->
            <div class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
                <img
                    src="{{ asset(optional($pinjaman->book)->cover ?? 'images/fallback.png') }}"
                    alt="{{ optional($pinjaman->book)->judul }}"
                    class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
                    onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
            </div>

            <!-- Info -->
            <div class="p-3">
                <p class="font-semibold text-sm md:text-base truncate w-full"
                   title="{{ optional($pinjaman->book)->judul }}">
                    {{ optional($pinjaman->book)->judul }}
                </p>

                <!-- Status -->
                <div class="mt-2">
                    <span class="text-[11px] font-medium px-2 py-[2px] rounded-full
                        {{
                            $pinjaman->status === 'dipinjam' ? 'bg-yellow-100 text-yellow-700' :
                            ($pinjaman->status === 'dikembalikan' ? 'bg-green-100 text-green-700' :
                            ($pinjaman->status === 'menunggu_validasi' ? 'bg-blue-100 text-blue-700' :
                            'bg-red-100 text-red-700'))
                        }}">
                        {{ ucfirst($pinjaman->status) }}
                    </span>
                </div>

                <p class="block text-center mt-3 text-[11px] text-white bg-cyan-400 hover:bg-cyan-500 px-2 py-[2px] rounded-full transition">
                    Lihat Detail
                </p>
            </div>
        </a>
    @endforeach
</div>

<!-- Pagination -->
<div class="mt-10 mb-10">
    {{ $pinjamans->withQueryString()->links('vendor.pagination.tailwind') }}
</div>
@else
   <div class="flex items-center justify-center min-h-[40vh]">
    <div class="text-center text-blue-400 text-lg">
        Tidak ada data pinjaman yang ditemukan.
    </div>
</div>

@endif
