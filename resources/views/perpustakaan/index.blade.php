@extends('layouts.perpus')

@section('content')
@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    .hide-scrollbar {
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE dan Edge */
    }
    .hide-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }
    .scroll-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    -webkit-overflow-scrolling: touch; /* Untuk smooth scroll di mobile */
}
    .mobile-menu {
            background: rgba(20, 20, 30, 0.98);
            backdrop-filter: blur(15px);
        }

        .mobile-menu-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 0;
            transition: all 0.3s ease;
        }

        .mobile-menu-item:hover {
            background: rgba(0, 150, 200, 0.2);
            padding-left: 20px;
        }

        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 12px;
            height: 12px;
            background: #ff3b30;
            border-radius: 50%;
            border: 2px solid #1a1a2e;
        }

        .demo-content {
            max-width: 1200px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(10, 15, 30, 0.7);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        }

        .feature-card {
            background: rgba(30, 40, 60, 0.6);
            border-radius: 15px;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 150, 255, 0.2);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(40, 50, 80, 0.8);
            box-shadow: 0 10px 25px rgba(0, 100, 255, 0.2);
        }

        .btn-primary {
            background: linear-gradient(90deg, #0062ff, #00c2ff);
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 150, 255, 0.4);
        }

        .book-cover {
            border-radius: 10px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .book-cover:hover {
            transform: rotate(3deg) scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 100, 255, 0.4);
        }
</style>
@endpush
<div class="demo-content">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-cyan-400 to-yellow-300 bg-clip-text text-transparent">SunLibrary</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto">Perpustakaan digital modern dengan koleksi buku terlengkap. Akses ribuan buku dari berbagai genre hanya dengan satu klik.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="feature-card p-6">
                <div class="text-cyan-400 text-4xl mb-4">
                    <i class="fas fa-book-open"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Koleksi Lengkap</h3>
                <p class="text-gray-300">Akses lebih dari 50,000 buku dari berbagai genre dan penerbit ternama di seluruh dunia.</p>
            </div>

            <div class="feature-card p-6">
                <div class="text-yellow-400 text-4xl mb-4">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Akses Digital</h3>
                <p class="text-gray-300">Baca buku kapan saja dan di mana saja melalui perangkat digital Anda tanpa batas.</p>
            </div>

            <div class="feature-card p-6">
                <div class="text-green-400 text-4xl mb-4">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Komunitas Pembaca</h3>
                <p class="text-gray-300">Bergabung dengan komunitas pembaca untuk berdiskusi dan berbagi pengalaman membaca.</p>
            </div>
        </div>

        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Buku Populer Minggu Ini</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <img src="https://m.media-amazon.com/images/I/81s6DUyQCZL._AC_UF1000,1000_QL80_.jpg" alt="Buku 1" class="book-cover w-full h-56 object-cover mb-3">
                    <h3 class="font-semibold">Laut Bercerita</h3>
                    <p class="text-gray-300 text-sm">Leila S. Chudori</p>
                </div>

                <div class="text-center">
                    <img src="https://m.media-amazon.com/images/I/81QuEGw8VPL._AC_UF1000,1000_QL80_.jpg" alt="Buku 2" class="book-cover w-full h-56 object-cover mb-3">
                    <h3 class="font-semibold">Bumi Manusia</h3>
                    <p class="text-gray-300 text-sm">Pramoedya A.T.</p>
                </div>

                <div class="text-center">
                    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1548497031i/42815558.jpg" alt="Buku 3" class="book-cover w-full h-56 object-cover mb-3">
                    <h3 class="font-semibold">Nebula</h3>
                    <p class="text-gray-300 text-sm">Tere Liye</p>
                </div>

                <div class="text-center">
                    <img src="https://cdn.gramedia.com/uploads/items/9786020324568_Pulang__w414_hauto.jpg" alt="Buku 4" class="book-cover w-full h-56 object-cover mb-3">
                    <h3 class="font-semibold">Pulang</h3>
                    <p class="text-gray-300 text-sm">Tere Liye</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button class="btn-primary inline-flex items-center">
                Lihat Semua Buku <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-12">

    <!-- Section Rekomendasi -->
    <section class="relative">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Rekomendasi</h2>
        </div>
        <div class="relative group">
            <!-- Mobile Arrows -->
           <button onclick="scrollHorizontally('rekomendasi-scroll', -300)" aria-label="Scroll left" class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Desktop Arrow -->
            <button onclick="scrollHorizontally('rekomendasi-scroll', -300)" aria-label="Scroll left" class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar" id="rekomendasi-scroll">
        @foreach ($rekomendasi as $buku)
    <a href="{{ route('perpustakaan.books.show', $buku->id) }}" class="flex-shrink-0 w-40 md:w-48 snap-start bg-gray-800 rounded-lg border-2 border-transparent hover:border-cyan-400 hover:scale-105 hover:shadow-lg transition-transform duration-300 ease-in-out block">
        <img src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}" alt="{{ $buku->judul }}" class="w-full h-56 md:h-64 object-cover">
        <div class="p-3">
            <p class="text-white font-semibold text-sm md:text-base truncate">{{ $buku->judul }}</p>
            <p class="text-gray-400 text-xs md:text-sm truncate">{{ $buku->kategori->nama ?? '-' }}</p>
        </div>
    </a>
@endforeach

            </div>
           <button onclick="scrollRight('rekomendasi-scroll')" aria-label="Scroll right" class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <button onclick="scrollRight('rekomendasi-scroll')" aria-label="Scroll right" class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    <!-- Section Buku Populer -->
    <section class="relative">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Buku Populer</h2>
        </div>
        <div class="relative group">
            <!-- Mobile Arrows -->
            <button onclick="scrollHorizontally('populer-scroll', -300)" aria-label="Scroll left" class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Desktop Arrow -->
            <button onclick="scrollHorizontally('populer-scroll', -300)" aria-label="Scroll left" class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar" id="populer-scroll">
                @foreach ($populer as $buku)
                <a href="{{ route('perpustakaan.books.show', $buku->id) }}" class="flex-shrink-0 w-40 md:w-48 snap-start bg-gray-800 rounded-lg border-2 border-transparent hover:border-cyan-400 hover:scale-105 hover:shadow-lg transition-transform duration-300 ease-in-out block">
                        <img src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}" alt="{{ $buku->judul }}" class="w-full h-56 md:h-64 object-cover rounded-t-lg">
                        <div class="p-3">
                            <p class="text-white font-semibold text-sm md:text-base truncate">{{ $buku->judul }}</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">{{ $buku->kategori->nama ?? '-' }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <button onclick="scrollRight('populer-scroll')" aria-label="Scroll right" class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <button onclick="scrollRight('populer-scroll')" aria-label="Scroll right" class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

    <!-- Section Buku Baru Rilis -->
    <section class="relative">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">Buku Baru Rilis</h2>
        </div>
        <div class="relative group">
            <!-- Mobile Arrows -->
    <button onclick="scrollHorizontally('baru-scroll', -300)" aria-label="Scroll left"
        class="md:hidden absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

    <!-- Desktop Arrow -->
    <button onclick="scrollHorizontally('baru-scroll', -300)" aria-label="Scroll left"
        class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

            <div class="flex gap-5 overflow-x-auto pb-4 scroll-smooth snap-x snap-mandatory px-2 hide-scrollbar" id="baru-scroll">
                @foreach ($baru as $buku)
                    <div class="flex-shrink-0 w-40 md:w-48 snap-start bg-gray-800 rounded-lg border-2 border-transparent hover:border-cyan-400 hover:scale-105 hover:shadow-lg transition-transform duration-300 ease-in-out">
                        <img src="{{ $buku->cover ? asset($buku->cover) : asset('img/default-cover.jpg') }}" alt="{{ $buku->judul }}" class="w-full h-56 md:h-64 object-cover rounded-t-lg">
                        <div class="p-3">
                            <p class="text-white font-semibold text-sm md:text-base truncate">{{ $buku->judul }}</p>
                            <p class="text-gray-400 text-xs md:text-sm truncate">{{ $buku->kategori->nama ?? '-' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button onclick="scrollRight('baru-scroll')" aria-label="Scroll right" class="md:hidden absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-8 h-8 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <button onclick="scrollRight('baru-scroll')" aria-label="Scroll right" class="hidden md:block absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-gray-800/80 hover:bg-gray-700/90 text-white rounded-full w-10 h-10 items-center justify-center transition-opacity opacity-0 group-hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>

</div>

@push('scripts')
<script>
    function scrollHorizontally(elementId, distance) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollLeft += distance;
    }
    }
    function scrollRight(containerId) {
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
</script>
@endpush


@endsection





