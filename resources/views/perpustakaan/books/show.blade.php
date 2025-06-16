@extends('layouts.perpus')

@section('title', 'Detail Buku')

@section('content')
<section>

  <div class="max-w-7xl mx-auto mt-1 mb-12 bg-transparent backdrop-blur-md rounded-2xl p-6 md:p-10 shadow-md border border-pink-100">
    {{-- Tombol Kembali --}}
    <div class="mb-8 mt-1">
      <a href="{{ route('perpustakaan.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-100 to-purple-200 text-purple-700 text-sm font-semibold rounded-full shadow hover:from-purple-200 hover:to-purple-300 transition duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Kembali</span>
      </a>
    </div>

    {{-- Konten Utama --}}
    <div class="flex flex-col md:flex-row gap-8">
      <img src="{{ asset($book->cover ?? 'images/fallback.png') }}" alt="{{ $book->judul }}"
        class="w-48 h-auto rounded-xl border-2 border-purple-200 shadow-sm object-cover"
        onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">

      <div class="flex-1">
        <h2 class="text-3xl md:text-4xl font-bold text-purple-700 leading-snug">{{ $book->judul }}</h2>
        <p class="text-pink-600 text-lg mt-1">{{ $book->penulis }}</p>
        <div class="text-yellow-400 text-lg mt-2">★★★★☆ {{ number_format($book->rating ?? 4.5, 1) }}</div>

        <a href="{{ route('perpustakaan.pinjaman.create', $book->id) }}"
          class="inline-block mt-4 px-6 py-2 bg-cyan-200 text-gray-800 font-semibold rounded-lg hover:bg-cyan-300 transition">
          Pinjam
        </a>

        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
          @php
              $detailItems = [
                ['label' => 'Kategori', 'value' => $book->kategori->nama ?? '-', 'color' => 'bg-pink-200'],
                ['label' => 'genre', 'value' => $book->genre?? '-', 'color' => 'bg-purple-200'],
                ['label' => 'Penulis', 'value' => $book->pengarang ?? '-', 'color' => 'bg-yellow-200'],
                ['label' => 'Lokasi Rak', 'value' => $book->lokasi_rak ?? '-', 'color' => 'bg-blue-200'],
                ['label' => 'Stok', 'value' => $book->stok ?? '-', 'color' => 'bg-green-200'],
              ];
          @endphp

          @foreach ($detailItems as $item)
            <div class="flex items-center gap-2">
              <span class="inline-block w-4 h-4 {{ $item['color'] }} rounded-full"></span>
              <span><strong>{{ $item['label'] }}:</strong> {{ $item['value'] }}</span>
            </div>
          @endforeach
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
      <p class="text-gray-700 leading-relaxed">{{ $book->deskripsi ?? 'Belum ada deskripsi untuk buku ini.' }}</p>
    </div>

    <div class="tab-content hidden mt-6">
      <table class="w-full text-sm text-left">
        <tbody class="text-gray-700">
          @php
              $detailRows = [
                  'Author' => $book->pengarang,
                  'Language' => ucfirst($book->bahasa),
                  'Category' => $book->kategori->nama ?? '-',
                  'Genre' => $book->genre ?? '-',
                  'Publisher' => $book->penerbit,
                  'Publication Date' => $book->tahun,
                  'Publication Place' => $book->tempat_terbit ?? '-',
                  'ISBN' => $book->isbn ?? '-',
                  'Jumlah Halaman' => $book->jumlah_halaman ?? '-',
                  'Lokasi Rak' => $book->lokasi_rak ?? '-',
                  'Stok' => $book->stok
              ];
          @endphp

          @foreach ($detailRows as $label => $value)
          <tr class="border-b border-pink-100">
            <td class="font-bold text-purple-600 py-2 w-1/3">{{ $label }}</td>
            <td class="py-2">{{ $value }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</section>
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
