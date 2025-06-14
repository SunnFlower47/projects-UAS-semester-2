@if($pinjamans->count())
    <div class="space-y-6">
        @foreach ($pinjamans as $pinjaman)
        <div class="flex bg-blue-100 text-blue-900 rounded-2xl shadow-md overflow-hidden border border-blue-200">
            <div class="w-40 flex-shrink-0">
                @if ($pinjaman->book && $pinjaman->book->cover)
                    <img src="{{ asset('storage/' . $pinjaman->book->cover) }}" alt="Cover Buku" class="h-full w-full object-cover">
                @else
                    <div class="h-full w-full bg-blue-200 flex items-center justify-center text-sm text-blue-700 italic">
                        Tidak Ada Cover
                    </div>
                @endif
            </div>
            <div class="flex-1 p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="text-xl font-semibold mb-2 text-sky-800">{{ $pinjaman->book->judul ?? 'Judul Tidak Diketahui' }}</h3>
                    <p class="text-sky-700 text-sm mb-1">Kode Transaksi: <span class="text-blue-900">{{ $pinjaman->kode_transaksi }}</span></p>
                    <p class="text-sky-700 text-sm mb-1">Rak Buku: <span class="text-blue-900">{{ $pinjaman->book->lokasi_rak ?? '-' }}</span></p>
                    <p class="text-sky-700 text-sm mb-1">Status:
                        <span class="inline-block px-2 py-1 rounded font-semibold text-white
                            {{ $pinjaman->status === 'dipinjam' ? 'bg-yellow-300 text-yellow-900' : ($pinjaman->status === 'dikembalikan' ? 'bg-green-300 text-green-900' : 'bg-red-300 text-red-900') }}">
                            {{ ucfirst($pinjaman->status) }}
                        </span>
                    </p>
                </div>
                <div>
                    <p class="text-sky-700 text-sm mb-1">Tanggal Pinjam: <span class="text-blue-900">{{ \Carbon\Carbon::parse($pinjaman->tanggal_pinjam)->format('d M Y') }}</span></p>
                    <p class="text-sky-700 text-sm mb-1">Tanggal Kembali: <span class="text-blue-900">{{ \Carbon\Carbon::parse($pinjaman->tanggal_kembali)->format('d M Y') }}</span></p>
                    <div class="mt-4">
                        <a href="{{ route('perpustakaan.pinjaman.download-pdf', $pinjaman->id) }}"
                           class="inline-block bg-indigo-200 hover:bg-indigo-300 text-indigo-900 text-sm font-medium px-4 py-2 rounded-lg transition">
                            Download Bukti
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="pagination mt-8 mb-1">
        {{ $pinjamans->links('vendor.pagination.tailwind') }}
    </div>
@else
    <div class="text-center text-blue-400">Hasil pencarian tidak ditemukan</div>
@endif
