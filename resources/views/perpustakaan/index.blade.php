@extends('layouts.perpus')

@section('title', 'main content')

@section('content')
@push('styles')
<style>
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .book-title {
        color: #374151;
    }

    /* Add background styles to slider */
    .slide {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

</style>
@endpush
<section class="bg-transparent text-[#5e3487] overflow-x-hidden">
  <div class="relative h-[28vh] sm:h-[34vh] md:h-[40vh] lg:h-[45vh] xl:h-[50vh] overflow-hidden">

    @php
      $backgrounds = ['content2.jpg', 'content1.jpg', 'content3.jpg'];
      $gradients = [
        'from-[#fbe4f0]/70 via-[#f8e7f5]/50',
        'from-[#e3f2fd]/70 via-[#edf5ff]/50',
        'from-[#e8f5e9]/70 via-[#f3fff5]/50'
      ];
      $textColors = ['text-[#7b3e82]', 'text-[#3a5b94]', 'text-[#457e55]'];
      $buttonColors = ['e89ac7', '90caf9', 'a5d6a7'];
    @endphp

    @if(count($sliderBooks) > 0)
      @foreach($sliderBooks as $index => $book)
      <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out scale-100 opacity-0 slide {{ $index === 0 ? 'active' : '' }}"
        style="background-image: url('{{ asset('images/' . $backgrounds[$index % 3]) }}');">
        <div class="relative z-10 h-full flex items-center bg-gradient-to-r {{ $gradients[$index % 3] }} to-transparent">
          <div class="ml-6 sm:ml-10 md:ml-16 max-w-md space-y-3 {{ $textColors[$index % 3] }} pt-4">
            <p class="uppercase font-semibold text-xs sm:text-sm tracking-widest drop-shadow-md">
              {{ $book->kategori->nama ?? 'Kategori' }}
            </p>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-wide drop-shadow-lg leading-tight">
              {{ $book->judul }}
            </h2>
            <a href="{{ route('perpustakaan.books.show', $book->id) }}"
            class="inline-block border-2 border-{{ $buttonColors[$index % 3] }} text-{{ $buttonColors[$index % 3] }} px-5 py-2 rounded-full uppercase text-xs sm:text-sm font-semibold bg-white/20 hover:bg-white/40 backdrop-blur-sm transition">
            Pinjam Sekarang
            </a>

          </div>
        </div>
      </div>
      @endforeach

      <!-- DOTS -->
      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-30">
        @foreach($sliderBooks as $book)
        <span class="dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white cursor-pointer"></span>
        @endforeach
      </div>
    @else
      <!-- Fallback konten kalau tidak ada buku -->
      <div class="absolute inset-0 bg-cover bg-center"
        style="background-image: url('{{ asset('images/content1.jpg') }}');">
        <div class="relative z-10 h-full flex items-center bg-gradient-to-r from-[#e3f2fd]/70 via-[#edf5ff]/50 to-transparent">
          <div class="ml-6 sm:ml-10 md:ml-16 max-w-md space-y-3 text-[#3a5b94] pt-4">
            <p class="uppercase font-semibold text-xs sm:text-sm tracking-widest drop-shadow-md">
              Tidak Ada Buku
            </p>
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold tracking-wide drop-shadow-lg leading-tight">
              Belum Ada Buku yang Ditampilkan
            </h2>
            <a href="#"
              class="inline-block border-2 border-[#90caf9] text-[#90caf9] px-5 py-2 rounded-full uppercase text-xs sm:text-sm font-semibold hover:bg-[#90caf9] hover:text-white transition drop-shadow-md">
              Kembali Nanti
            </a>
          </div>
        </div>
      </div>
    @endif

  </div>
</section>


@php
use Carbon\Carbon;

$today = now()->startOfDay(); // Sesuaikan dengan controller
$notif = null;

if ($currentLoan && $currentLoan->tanggal_kembali) {
    $dueDate = Carbon::parse($currentLoan->tanggal_kembali)->startOfDay();
    $diffDays = $today->diffInDays($dueDate, false);

    if ($currentLoan->status === 'terlambat') {
        $notif = [
            'type' => 'danger',
            'message' => "Buku <strong>{$currentLoan->book->judul}</strong> sudah melewati batas pengembalian!"
        ];
    } elseif ($diffDays <= 2 && $diffDays >= 0) {
        $notif = [
            'type' => 'warning',
            'message' => "Buku <strong>{$currentLoan->book->judul}</strong> hampir jatuh tempo. Segera dikembalikan ya."
        ];
    }
}
@endphp

<section class="py-10 bg-transparent">
  <div class="max-w-screen-xl mx-auto px-6">
    <!-- Header -->
    <h2 class="text-2xl font-semibold text-pink-700 mb-6 flex items-center gap-2">
      <x-heroicon-o-user class="w-5 h-5 text-pink-500" />
      Selamat Datang, {{ auth()->user()->name }}
    </h2>
<!-- Notifikasi -->
    @if (!empty($notif) && isset($notif['type'], $notif['message']))
    <div class="mb-6 px-4 py-3 rounded-lg shadow-md
        {{ $notif['type'] === 'danger'
            ? 'bg-red-100 text-red-700 border border-red-300'
            : 'bg-yellow-100 text-yellow-800 border border-yellow-300' }}">
        <div class="flex items-start gap-2">
            <x-heroicon-o-exclamation-circle class="w-5 h-5 mt-1" />
            <div class="text-sm leading-snug">
                {!! $notif['message'] !!}
            </div>
        </div>
    </div>
@endif

    <!-- Info Buku -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Terakhir Dipinjam -->
      <div class="p-6 rounded-2xl bg-pink-50 border border-pink-100 shadow">
        <div class="flex items-center gap-2 text-pink-600 font-medium mb-2">
          <x-heroicon-o-book-open class="w-5 h-5" />
          Buku Terakhir
        </div>
        @if ($lastLoan)
          <h3 class="text-lg font-bold text-purple-800">{{ $lastLoan->book->judul }}</h3>
          <p class="text-sm text-gray-500 mt-1">
            Dipinjam: {{ ($lastLoan->tanggal_pinjam)->format('d M Y') }}
          </p>
          <a href="{{ route('perpustakaan.pinjaman.detail', $lastLoan->id) }}" route="perpustakaan.pinjaman.detail" class="text-xs text-purple-500 mt-2 inline-block underline hover:text-purple-600">
            Lihat Detail
          </a>
        @else
          <p class="text-sm text-gray-400">Kamu belum pernah meminjam buku.</p>
        @endif
      </div>

      <!-- Belum Dikembalikan -->
      <div class="p-6 rounded-2xl bg-purple-50 border border-purple-100 shadow">
        <div class="flex items-center gap-2 text-purple-600 font-medium mb-2">
          <x-heroicon-o-clock class="w-5 h-5" />
          Belum Dikembalikan
        </div>
        @if ($currentLoan)
          <h3 class="text-lg font-bold text-pink-800">{{ $currentLoan->book->judul }}</h3>
          <p class="text-sm text-gray-500 mt-1">
            Jatuh Tempo: {{ ($currentLoan->tanggal_kembali)->format('d M Y') }}
          </p>
          <a href="{{ route('perpustakaan.pinjaman.detail', $currentLoan->id) }}" route="perpustakaan.pinjaman.detail" class="text-xs text-purple-500 mt-2 inline-block underline hover:text-purple-600">
            Detail Pinjaman
          </a>
        @else
          <p class="text-sm text-gray-400">Tidak ada buku yang sedang dipinjam.</p>
        @endif
      </div>
    </div>

    <!-- Navigasi -->
    <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
      <a href="{{ route('perpustakaan.pinjaman.riwayat-pinjaman') }}"
         class="flex items-center gap-2 px-5 py-2 rounded-full bg-pink-100 text-pink-700 font-medium text-sm hover:bg-pink-200 transition">
        <x-heroicon-o-arrow-path class="w-5 h-5" />
        Riwayat Pinjaman
      </a>
      <a href="{{ route('perpustakaan.books.daftar_buku') }}"
         class="flex items-center gap-2 px-5 py-2 rounded-full bg-purple-100 text-purple-700 font-medium text-sm hover:bg-purple-200 transition">
        <x-heroicon-o-book-open class="w-5 h-5" />
        Lihat Semua Buku
      </a>
    </div>
  </div>
</section>


    <blockquote class="italic text-center text-purple-500 font-semibold text-lg my-10">
  “Di balik setiap buku, ada dunia yang menanti. Di sini, kami hanya mempermudah kamu untuk menjangkaunya.”
</blockquote>



<div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-12">

    <!-- Section Rekomendasi -->
    <section id="daftar-buku"></section>
    <section  class="relative px-4 md:px-6 lg:px-12 py-6">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-[#00BCD4] tracking-wide">Rekomendasi</h2>
            <div class="w-full h-[2px] mt-2 bg-[#00BCD4] opacity-60"></div>
        </div>
        <div class="relative group">
            <!-- Mobile Arrows -->
            <button
                onclick="scrollToLeft('rekomendasi-scroll')"
                aria-label="Scroll left"
                class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <!-- Desktop Arrow -->
            <button
                onclick="scrollToLeft('rekomendasi-scroll')"
                aria-label="Scroll left"
                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <div
                class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar"
                id="rekomendasi-scroll">
                @foreach ($rekomendasi as $buku)
                <a
                    href="{{ route('perpustakaan.books.show', $buku->id) }}"
                    class="book-card flex-shrink-0 w-40 md:w-48 snap-start block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">

                    <div
                        class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
                        <img
                            src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}"
                            alt="{{ $buku->judul }}"
                            class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
                            onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
                        </div>
                        <div class="p-3 ">
                            <p class="book-title font-semibold text-sm md:text-base truncate w-full"title="{{ $buku->judul }}">{{ $buku->judul }}</p>
                            <div class="flex gap-1 mt-1">
                            {{-- Kategori --}}
                            <span class="text-[10px] bg-cyan-100 text-blue-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                {{ $buku->kategori->nama ?? '-' }}
                            </span>
                            {{-- Genre --}}
                            <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full"
                                title="{{ $buku->genre ?? '-' }}">
                                {{ $buku->genre ?? '-' }}
                            </span>
                            </div>
                            <p class="block text-center mt-2 text-[11px] text-white bg-cyan-400 hover:bg-cyan-500 px-2 py-[2px] rounded-full transition">Lihat Detail</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                <!-- Mobile Arrows -->
                <button
                    onclick="scrollToRight('rekomendasi-scroll')"
                    aria-label="Scroll right"
                    class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <!-- Desktop Arrow -->
                <button
                    onclick="scrollToRight('rekomendasi-scroll')"
                    aria-label="Scroll right"
                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 z-10
                    bg-pink-300/80 hover:bg-pink-400/90 text-white
                    rounded-full w-10 h-10
                    items-center justify-center
                    transition-opacity opacity-0 group-hover:opacity-100">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
        </section>

        <!-- Section Buku Populer -->
        <section class="relative px-4 md:px-6 lg:px-12 py-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-[#66BB6A] tracking-wide">Populer</h2>
                    <div class="w-full h-[2px] mt-2 bg-[#66BB6A] opacity-60"></div>
                </div>
                <div class="relative group">
                    <!-- Mobile Arrows -->
                    <button
                        onclick="scrollToLeft('populer-scroll')"
                        aria-label="Scroll left"
                        class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <!-- Desktop Arrow -->
                    <button
                        onclick="scrollToLeft('populer-scroll')"
                        aria-label="Scroll left"
                        class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                            <div
                            class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar"
                            id="populer-scroll">

                            @foreach ($populer as $buku)
                            <a
                                href="{{ route('perpustakaan.books.show', $buku->id) }}"
                                class="book-card flex-shrink-0 w-40 md:w-48 snap-start block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">

                                <div class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
                                    <img
                                        src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}"
                                        alt="{{ $buku->judul }}"
                                        class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
                                        onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';">
                                </div>
                                <div class="p-3 ">
                                    <p class="book-title font-semibold text-sm md:text-base truncate w-full" title="{{ $buku->judul }}">
                                        {{ $buku->judul }}
                                    </p>
                                    <div class="flex gap-1 mt-1">
                                        {{-- Kategori --}}
                                        <span class="text-[10px] bg-cyan-100 text-green-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                            {{ $buku->kategori->nama ?? '-' }}
                                        </span>
                                        {{-- Genre --}}
                                        <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full"
                                            title="{{ $buku->genre ?? '-' }}">
                                            {{ $buku->genre ?? '-' }}
                                        </span>
                                    </div>

                                    <p class="block text-center mt-2 text-[11px] text-white bg-green-400 hover:bg-green-500 px-2 py-[2px] rounded-full transition">
                                        Lihat Detail
                                    </p>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        <!-- Mobile Arrow -->
                        <button
                            onclick="scrollToRight('populer-scroll')"
                            aria-label="Scroll right"
                            class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <!-- Desktop Arrow -->
                        <button
                            onclick="scrollToRight('populer-scroll')"
                            aria-label="Scroll right"
                            class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 z-10
                                bg-pink-300/80 hover:bg-pink-400/90 text-white
                                rounded-full w-10 h-10
                                items-center justify-center
                                transition-opacity opacity-0 group-hover:opacity-100">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </section>
                <!-- Section Buku Baru Rilis -->
                <section class="relative px-4 md:px-6 lg:px-12 py-6">
                        <div class="mb-6">
                            <h2 class="text-2xl font-semibold text-[#a46ede] tracking-wide">Terbaru</h2>
                                <div class="w-full h-[2px] mt-2 bg-[#a46ede] opacity-60"></div>
                        </div>

                        <div class="relative group">
                            <!-- Mobile Arrows -->
                            <button
                                onclick="scrollToLeft('baru-scroll')"
                                aria-label="Scroll left"
                                class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>

                            <!-- Desktop Arrow -->
                            <button
                                onclick="scrollToLeft('baru-scroll')"
                                aria-label="Scroll left"
                                class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>

                            <div
                                class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar"
                                id="baru-scroll">
                                @foreach ($baru as $buku)
                                <a
                                    href="{{ route('perpustakaan.books.show', $buku->id) }}"
                                    class="book-card flex-shrink-0 w-40 md:w-48 snap-start block hover:-translate-y-1 hover:scale-105 hover:shadow-lg transition-all duration-300 ease-in-out">

                                    <div
                                        class="bg-white p-1 rounded-lg shadow-sm hover:scale-105 transition-transform duration-300">
                                        <img
                                            src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}"
                                            alt="{{ $buku->judul }}"
                                            class="w-full h-56 md:h-64 object-cover rounded-md bg-gray-100"
                                            onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';"></div>
                                        <div class="p-3 ">
                                        <p class="book-title font-semibold text-sm md:text-base truncate w-full"title="{{ $buku->judul }}">{{ $buku->judul }}</p>
                                        <div class="flex gap-1 mt-1">
                                        {{-- Kategori --}}
                                        <span class="text-[10px] bg-purple-100 text-purple-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                            {{ $buku->kategori->nama ?? '-' }}
                                        </span>
                                        {{-- Genre --}}
                                        <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full"
                                            title="{{ $buku->genre ?? '-' }}">
                                            {{ $buku->genre ?? '-' }}
                                        </span>

                                        </div>
                                        <p class="block text-center mt-2 text-[11px] text-white bg-purple-400 hover:bg-purple-500 px-2 py-[2px] rounded-full transition">Lihat Detail</p>
                                    </div>
                                    </a>
                                    @endforeach
                                </div>

                                <!-- Mobile Arrow -->
                                <button
                                    onclick="scrollToRight('baru-scroll')"
                                    aria-label="Scroll right"
                                    class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-pink-300/80 hover:bg-pink-400/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                <!-- Desktop Arrow -->
                                <button
                                    onclick="scrollToRight('baru-scroll')"
                                    aria-label="Scroll right"
                                    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 z-10
                                        bg-pink-300/80 hover:bg-pink-400/90 text-white
                                        rounded-full w-10 h-10
                                        items-center justify-center
                                        transition-opacity opacity-0 group-hover:opacity-100">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </section>
                    </div>
@push('scripts')
<script>
    function scrollToLeft(containerId) {
        const container = document.getElementById(containerId);
        if (!container) {
            console.error(`Container with ID "${containerId}" not found.`);
            return;
        }

        container.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    }
    function scrollToRight(containerId) {
        const container = document.getElementById(containerId);
        if (!container) {
            console.error(`Container with ID "${containerId}" not found.`);
            return;
        }

        container.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    }

    function updateArrowVisibility() {
        document.querySelectorAll('[class*="overflow-x-auto"]').forEach(container => {
            const containerId = container.id;
            if (!containerId) return;

            const leftBtns = document.querySelectorAll(`[data-scroll-left="${containerId}"]`);
            const rightBtns = document.querySelectorAll(`[data-scroll-right="${containerId}"]`);

            const canScrollLeft = container.scrollLeft > 0;
            const canScrollRight = container.scrollLeft < (container.scrollWidth - container.clientWidth - 1);

            leftBtns.forEach(btn => {
                btn.style.opacity = canScrollLeft ? '1' : '0';
                btn.style.pointerEvents = canScrollLeft ? 'auto' : 'none';
            });

            rightBtns.forEach(btn => {
                btn.style.opacity = canScrollRight ? '1' : '0';
                btn.style.pointerEvents = canScrollRight ? 'auto' : 'none';
            });
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        updateArrowVisibility();

        document.querySelectorAll('[class*="overflow-x-auto"]').forEach(container => {
            container.addEventListener('scroll', updateArrowVisibility);
        });

        window.addEventListener('resize', updateArrowVisibility);
        setTimeout(updateArrowVisibility, 300); // fallback jika konten load lambat
    });
    // Only initialize slider if elements exist
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    if (slides.length > 0 && dots.length > 0) {
        let index = 0;

        function showSlide(i) {
            slides.forEach((slide, idx) => {
                slide.classList.toggle('opacity-100', idx === i);
                slide.classList.toggle('opacity-0', idx !== i);
                slide.classList.toggle('z-20', idx === i);
                dots[idx].style.backgroundColor = idx === i ? "#E1BEE7" : "rgba(255,255,255,0.3)";
                dots[idx].classList.toggle('scale-125', idx === i);
            });
            index = i;
        }

        function nextSlide() {
            let newIndex = (index + 1) % slides.length;
            showSlide(newIndex);
        }

        let autoSlide = setInterval(nextSlide, 5000);

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                clearInterval(autoSlide);
                showSlide(i);
                autoSlide = setInterval(nextSlide, 5000);
            });
        });

        showSlide(index);
    }
</script>
@endpush
@endsection





