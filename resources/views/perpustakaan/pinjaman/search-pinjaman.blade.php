@if($pinjamans->count())
    <div class="space-y-6">
        @foreach ($pinjamans as $pinjaman)
        <div class="flex bg-gray-800 text-white rounded-2xl shadow-lg overflow-hidden">
            <div class="w-40 flex-shrink-0">
                @if ($pinjaman->book && $pinjaman->book->cover)
                    <img src="{{ asset('storage/' . $pinjaman->book->cover) }}" alt="Cover Buku" class="h-full w-full object-cover">
                @else
                    <div class="h-full w-full bg-gray-600 flex items-center justify-center text-sm text-gray-300 italic">
                        Tidak Ada Cover
                    </div>
                @endif
            </div>
            <div class="flex-1 p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-xl font-semibold mb-2">{{ $pinjaman->book->judul ?? 'Judul Tidak Diketahui' }}</h3>
                    <p class="text-gray-400 text-sm mb-1">Kode Transaksi: <span class="text-white">{{ $pinjaman->kode_transaksi }}</span></p>
                    <p class="text-gray-400 text-sm mb-1">Rak Buku: <span class="text-white">{{ $pinjaman->book->lokasi_rak ?? '-' }}</span></p>
                    <p class="text-gray-400 text-sm mb-1">Status:
                        <span class="inline-block px-2 py-1 rounded font-semibold text-black
                            {{ $pinjaman->status === 'dipinjam' ? 'bg-yellow-400' : ($pinjaman->status === 'dikembalikan' ? 'bg-green-400' : 'bg-red-400') }}">
                            {{ ucfirst($pinjaman->status) }}
                        </span>
                    </p>
                </div>
                <div>
                    <p class="text-gray-400 text-sm mb-1">Tanggal Pinjam: <span class="text-white">{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</span></p>
                    <p class="text-gray-400 text-sm mb-1">Tanggal Kembali: <span class="text-white">{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</span></p>
                    <div class="mt-4">
                        <a href="{{ route('perpustakaan.pinjaman.download-pdf', $pinjaman->id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg">
                            Download Bukti
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $pinjamans->links('vendor.pagination.tailwind') }}
    </div>
@else
    <div class="text-center text-gray-400">hasil pencarian tidak ditemukan</div>
@endif
