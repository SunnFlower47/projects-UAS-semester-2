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
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #fff1f5, #f0f7ff, #f3fff5);
            background-attachment: fixed;
            background-size: cover;
            color: #333;
        }
        /* Style tambahan untuk efek blur di navbar */
        .social-link:hover {
            transform: scale(1.1);
            color: #ec4899;
            transition: all 0.3s ease;
        }
        .pagination a {
            @apply bg-pink-200 text-indigo-800 hover:bg-pink-300 transition-colors;
        }

        .pagination span {
            @apply bg-pink-500 text-white font-semibold shadow;
        }

    </style>


</head>

<body >

    {{-- <-- navbar --> --}}
    @include('layouts.partials.nvbar')

    {{-- <-- main content --> --}}
    <main class="content">
        @yield('content')
    </main>

    {{-- <-- footer --> --}}
    @include('layouts.partials.footer')

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>
