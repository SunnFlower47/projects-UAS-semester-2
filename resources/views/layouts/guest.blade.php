<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/content.css') }}"> --}}

    {{-- font-awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@stack('styles')
<style>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
  html {
    scroll-behavior: smooth;
    overflow-y: auto;
    scrollbar-gutter: stable;
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: #d8b4fe #f3e8ff;
  }

  /* Scrollbar untuk Chrome, Edge, Safari */
  html::-webkit-scrollbar {
    width: 6px;
  }

  html::-webkit-scrollbar-track {
    background: #f3e8ff; /* pastel ungu muda */
  }

  html::-webkit-scrollbar-thumb {
    background-color: #d8b4fe;
    border-radius: 10px;
    border: 2px solid transparent;
    background-clip: content-box;
    transition: background-color 0.3s ease;
  }

  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fcefee, #f9f2ff, #e4f9f5, #fffbe6);
    background-size: 400% 400%;
    animation: dreamyFlow 15s ease infinite;
  }

  @keyframes dreamyFlow {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  .social-link:hover {
    transform: scale(1.1);
    color: #ec4899;
    transition: all 0.3s ease;
  }

  @media (min-width: 768px) and (max-width: 1024px) {
    nav .text-sm {
      font-size: 0.875rem;
    }

    nav .space-x-6 > * {
      margin-left: 0.75rem;
      margin-right: 0.75rem;
    }
  }
  @keyframes jumpWave {
    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-12px);
    }
  }

  .jump {
    display: inline-block;
    animation: jumpWave 1.4s ease-in-out infinite;
  }

.delay-0 { animation-delay: 0s; }
.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.2s; }
.delay-3 { animation-delay: 0.3s; }
.delay-4 { animation-delay: 0.4s; }
.delay-5 { animation-delay: 0.5s; }
.delay-6 { animation-delay: 0.6s; }
.delay-7 { animation-delay: 0.7s; }

</style>

</head>

<body >
    <div id="global-loader" class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-white transition-opacity duration-300">
  <div class="flex gap-1 text-4xl font-bold text-[#a46ede]">
    <span class="jump delay-0">R</span>
    <span class="jump delay-1">E</span>
    <span class="jump delay-2">A</span>
    <span class="jump delay-3">D</span>
    <span class="jump delay-4">Z</span>
    <span class="jump delay-5">O</span>
    <span class="jump delay-6">N</span>
    <span class="jump delay-7">E</span>
  </div>
  <p class="mt-2 text-sm text-gray-400 animate-pulse">Please wait...</p>
</div>
     @include('layouts.partials.navbar-guest')

    <div class="min-h-screen">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    @stack('scripts')
<script>
  window.addEventListener('load', () => {
    const loader = document.getElementById('global-loader');
    // Add a check to ensure loader is not null before accessing style
    if (loader) {
      loader.style.opacity = '0';
      setTimeout(() => {
        loader.style.display = 'none';
      }, 500);
    }
  });

  document.querySelectorAll('a[href]').forEach(link => {
    link.addEventListener('click', e => {
      if (
        link.getAttribute('target') === '_blank' ||
        link.getAttribute('href').startsWith('#') ||
        link.href.includes('javascript:')
      ) return;
      const loader = document.getElementById('global-loader');
      // Add a check to ensure loader is not null before accessing style
      if (loader) {
        loader.style.display = 'flex';
        loader.style.opacity = '1';
      }
    });
  });
</script>
</body>

</html>
