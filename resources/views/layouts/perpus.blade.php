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

    <style>
        /* Style tambahan untuk efek blur di navbar */
        .sticky-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: background-color 0.3s ease;
        }

    </style>
    @stack('styles')

</head>

<body class="bg-gray-900 text-white">

    {{-- <-- navbar --> --}}
    @include('layouts.partials.nvbar')

    {{-- <-- main content --> --}}
    <main class="content-wrapper">
        @yield('content')
    </main>

    {{-- <-- footer --> --}}
    @include('layouts.partials.footer')

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>
