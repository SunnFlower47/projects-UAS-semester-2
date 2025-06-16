@extends('layouts.guest')

@section('content')
@push('styles')
<style>
        :root {

        /* Warna Pastel Utama */
        --pastel-blue: #a0d2eb;
        --pastel-pink: #e5beed;
        --pastel-lavender: #d6c9ff;
        --pastel-purple: #cba8f5;
        /* Background & Card */
        --light-bg: #ffffff;
        --card-bg: #f8f9fa;
        --bg-gradient: linear-gradient(135deg, #fef6ff, #f6fcff);

        /* Warna Teks */
        --text-dark: #5a5a72;
        --text-light: #8a8aa3;
        --text-muted: #b3b3c4;
        --text-heading: #443e5c;

        /* Efek Visual */
        --accent-color: #8a9ea7;
        --shadow-soft: 0 4px 12px rgba(0, 0, 0, 0.05);
        --shadow-hover: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .hero {
        min-height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column; /* Ensure CSS variables are defined */
        padding: 0 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    html {
        scroll-behavior: smooth;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
    font-size: clamp(1.8rem, 3.5vw, 3.5rem);
    font-weight: 700;
    background: linear-gradient(45deg, #8CC7F2, #B890D9, #F5A6C9);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); /* Lebih ringan */
    }



    .cta-button {
        display: inline-block;
        background: var(--pastel-pink);
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        box-shadow: var(--shadow-soft);
        transition: all 0.3s ease;
    }

    .cta-button:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        background: var(--pastel-lavender);
    }

    .card {
        background-color: var(--card-bg);
        box-shadow: var(--shadow-soft);
        border-radius: 1rem;
        padding: 1.5rem;
        color: var(--text-dark);
    }
    .hero-content > .cta-button {
        margin-top: 1.5rem;
    }
    .hero-subtitle {
    font-size: 1.1rem;
    max-width: 600px;
    margin: 1rem auto 0;
    color: #6c678d;
    line-height: 1.6;
    letter-spacing: 0.3px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
}


    /* Animations */
    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }
    @media (max-width: 480px) {
    .cta-button {
        font-size: 1rem;
        padding: 12px 24px;
    }

    .hero-subtitle {
        font-size: 0.95rem;
        padding: 0 1rem;
    }
}
</style>
@endpush
<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title floating">Temukan Buku Favoritmu Tanpa Ribet</h1>
        <p class="hero-subtitle">
            Cari dan pesan buku untuk dibaca langsung di perpustakaan atau dibawa pulang.
            Cek informasi rak dan ketersediaan buku dengan cepat dan praktis.
        </p>
        <a href="{{ route('perpustakaan.books.daftar_buku') }}" class="cta-button">Telusuri Buku <i class="fas fa-arrow-right ml-2"></i></a>
    </div>
</section>

<section class="py-16 bg-transparent">
  <div class="max-w-6xl mx-auto px-4">
   <h2 class="text-3xl md:text-4xl font-bold text-center text-[#A78BFA] mb-16">
  Fitur Unggulan
  <span class="block h-1 w-24 mx-auto mt-2 rounded-full bg-gradient-to-r from-blue-200 via-pink-200 to-purple-200"></span>
</h2>



    <div class="grid gap-8 grid-cols-1 md:grid-cols-3">
      <!-- Card 1 -->
      <div class="bg-transparent p-6 rounded-2xl shadow-sm border-t-4 border-blue-200 hover:shadow-lg transition-all duration-300">
        <div class="text-blue-400 text-4xl mb-4">
          <i class="fas fa-layer-group"></i>
        </div>
       <h3 class="text-lg font-semibold text-[#A78BFA] mb-2">Koleksi Beragam</h3>
        <p class="text-sm text-gray-600 leading-relaxed">
          Ribuan buku dari berbagai kategori, mulai dari fiksi, ilmiah, hingga referensi kampus.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="bg-transparent p-6 rounded-2xl shadow-sm border-t-4 border-pink-200 hover:shadow-lg transition-all duration-300">
        <div class="text-pink-400 text-4xl mb-4">
          <i class="fas fa-calendar-check"></i>
        </div>
        <h3 class="text-lg font-semibold text-pink-800 mb-2">Booking Buku Mudah</h3>
        <p class="text-sm text-gray-600 leading-relaxed">
          Pesan buku langsung dari aplikasi untuk dibaca di perpustakaan atau dibawa pulang.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="bg-transparent p-6 rounded-2xl shadow-sm border-t-4 border-purple-200 hover:shadow-lg transition-all duration-300">
        <div class="text-purple-400 text-4xl mb-4">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <h3 class="text-lg font-semibold text-purple-800 mb-2">Info Rak Buku</h3>
        <p class="text-sm text-gray-600 leading-relaxed">
          Lihat lokasi rak dan ketersediaan buku langsung dari aplikasi sebelum kamu datang ke perpus.
        </p>
      </div>
    </div>
  </div>
</section>
@endsection
