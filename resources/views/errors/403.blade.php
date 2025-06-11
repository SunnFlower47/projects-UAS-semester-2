@extends('layouts.perpus')

@section('content')
<div class="min-h-[85vh] flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 px-4 text-center">
    <h1 class="text-7xl font-extrabold text-cyan-400 dark:text-cyan-300 mb-4">403</h1>
    <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300">
        Maaf, akses kamu ditolak karena kamu bukan admin.
    </p>
    <a href="{{ url('perpustakaan') }}"
       class="mt-6 inline-block px-6 py-2 text-sm font-semibold text-white bg-cyan-400 hover:bg-cyan-500 rounded-lg transition">
        Kembali ke Beranda
    </a>
</div>
@endsection

{{-- @extends('layouts.perpus')

@section('content')
<div class="min-h-[85vh] flex flex-col items-center justify-center bg-gray-50 dark:bg-gray-900 px-4 text-center">
    <h1 class="text-7xl font-extrabold text-amber-500 dark:text-amber-400 mb-4">403</h1>
    <p class="text-lg md:text-xl text-gray-700 dark:text-gray-300">Maaf, akses kamu ditolak karena kamu bukan admin.</p>
    <a href="{{ url('perpustakaan') }}"
       class="mt-6 inline-block px-6 py-2 text-sm font-semibold text-white bg-amber-500 hover:bg-amber-600 rounded-lg transition">
        Kembali ke Beranda
    </a>
</div>
@endsection --}}
