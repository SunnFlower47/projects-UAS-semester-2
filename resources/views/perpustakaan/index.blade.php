@extends('layouts.perpus')

@section('content')
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');


    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .bg-card {
    background: linear-gradient(135deg, #fdfcff, #eef6f9); /* Lebih lembut & terang */
}

.bg-dark-card {
    background: linear-gradient(135deg, #dcdde1, #f3f4f6); /* Lebih netral, elegan */
}

.pastel-text {
    color: #6b7280; /* Abu pastel modern */
}



.rounded-lg {
    border-radius: 1rem;
}

/* Animasi masuk */
@keyframes fadeScaleIn {
    0% {
        opacity: 0;
        transform: scale(0.92);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.book-card {
     background: linear-gradient(135deg, #e1f7f5, #d2f1f0);
    border-radius: 0.875rem;
    border: 2px solid transparent;
    animation: fadeScaleIn 0.5s ease forwards;
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
     box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

.book-card:hover {
    background: linear-gradient(135deg, #c9ebdf, #e0f0ff);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    transform: translateY(-4px) scale(1.05);
}



    .book-title {
        color: #374151;
    }

    .book-category {
        color: #6B7280;
    }
    .pink-accent {
      color: #E1BEE7;
    }
    .bg-pink-custom {
      background-color: #E1BEE7;
    }
    .border-pink-custom {
      border-color: #E1BEE7;
    }
    .hover-bg-pink-custom:hover {
      background-color: #E1BEE7;
    }
    .hover-text-dark:hover {
      color: #2c2c2c;
    }
</style>

@endpush
<div class="bg-[#E1BEE7] text-[#4a148c] overflow-x-hidden">

  <div class="relative h-[65vh] overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out scale-105 opacity-0 slide active" style="background-image: url('images/content2.jpg');">
      <div class="relative z-10 h-full flex items-center bg-gradient-to-r from-[#4a148c]/60 to-transparent">
        <div class="ml-10 md:ml-20 max-w-lg space-y-4 text-white">
          <p class="uppercase font-bold text-sm tracking-widest pink-accent">Koleksi Terbaru</p>
          <h2 class="text-3xl md:text-4xl font-bold title">Jejak Waktu di Kertas Usang</h2>
          <a href="#" class="inline-block border-2 border-pink-custom text-white px-6 py-2 rounded-full uppercase font-semibold hover-bg-pink-custom hover-text-dark transition">Lihat Detail</a>
        </div>
      </div>
    </div>

    <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out scale-105 opacity-0 slide" style="background-image: url('images/content1.jpg');">
      <div class="relative z-10 h-full flex items-center bg-gradient-to-r from-[#4a148c]/60 to-transparent">
        <div class="ml-10 md:ml-20 max-w-lg space-y-4 text-white">
          <p class="uppercase font-bold text-sm tracking-widest pink-accent">Rekomendasi Editor</p>
          <h2 class="text-3xl md:text-4xl font-bold title">Atomic Habits</h2>
          <a href="#" class="inline-block border-2 border-pink-custom text-white px-6 py-2 rounded-full uppercase font-semibold hover-bg-pink-custom hover-text-dark transition">Pinjam Sekarang</a>
        </div>
      </div>
    </div>

    <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000 ease-in-out scale-105 opacity-0 slide" style="background-image: url('images/content3.jpg');">
      <div class="relative z-10 h-full flex items-center bg-gradient-to-r from-[#4a148c]/60 to-transparent">
        <div class="ml-10 md:ml-20 max-w-lg space-y-4 text-white">
          <p class="uppercase font-bold text-sm tracking-widest pink-accent">Populer Minggu Ini</p>
          <h2 class="text-3xl md:text-4xl font-bold title">Seni Berpikir Tenang</h2>
          <a href="#" class="inline-block border-2 border-pink-custom text-white px-6 py-2 rounded-full uppercase font-semibold hover-bg-pink-custom hover-text-dark transition">Baca Sinopsis</a>
        </div>
      </div>
    </div>

    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-3 z-30">
      <span class="dot w-4 h-4 rounded-full bg-white/30 cursor-pointer"></span>
      <span class="dot w-4 h-4 rounded-full bg-white/30 cursor-pointer"></span>
      <span class="dot w-4 h-4 rounded-full bg-white/30 cursor-pointer"></span>
    </div>
  </div>
</div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-12">

    <!-- Section Rekomendasi -->
    <section class="relative px-4 md:px-6 lg:px-12 py-6">
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
                            onerror="this.onerror=null;this.src='{{ asset('images/fallback.png') }}';"></div>

                        <div class="p-3 ">
                            <p class="book-title font-semibold text-sm md:text-base truncate w-full"title="{{ $buku->judul }}">{{ $buku->judul }}</p>
                            <div class="flex gap-1 mt-1">
                            {{-- Kategori --}}
                            <span class="text-[10px] bg-cyan-100 text-cyan-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                {{ $buku->kategori->nama ?? '-' }}
                            </span>

                            {{-- Genre --}}
                            @if ($buku->kategori?->nama)
                                <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama }}">
                                    {{ $buku->kategori->genre ?? '-' }}
                                </span>
                            @endif

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
        <section class="relative">
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
                            <span class="text-[10px] bg-cyan-100 text-cyan-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                {{ $buku->kategori->nama ?? '-' }}
                            </span>

                            {{-- Genre --}}
                            @if ($buku->kategori?->nama)
                                <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama }}">
                                    {{ $buku->kategori->genre ?? '-' }}
                                </span>
                            @endif

                            </div>
                            <p class="block text-center mt-2 text-[11px] text-white bg-green-400 hover:bg-green-500 px-2 py-[2px] rounded-full transition">Lihat Detail</p>
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
                <section class="relative">
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
                                        <span class="text-[10px] bg-cyan-100 text-cyan-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama ?? '-' }}">
                                            {{ $buku->kategori->nama ?? '-' }}
                                        </span>

                                        {{-- Genre --}}
                                        @if ($buku->kategori?->nama)
                                            <span class="text-[10px] bg-pink-100 text-pink-600 font-medium px-2 py-[2px] rounded-full" title="{{ $buku->kategori->nama }}">
                                                {{ $buku->kategori->genre ?? '-' }}
                                            </span>
                                        @endif

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
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
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
</script>
@endpush


@endsection





