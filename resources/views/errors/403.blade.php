@extends('layouts.perpus')

@section('content')
<div class="min-h-[85vh] flex flex-col items-center justify-center bg-pink-50 dark:bg-pink-200 px-4 text-center">
    <h1 class="text-7xl font-extrabold text-pink-400 dark:text-pink-600 mb-4">403</h1>
    <p class="text-lg md:text-xl text-pink-700 dark:text-pink-800">
        Maaf, akses kamu ditolak karena kamu bukan admin.
    </p>
    <a href="{{ url('perpustakaan') }}"
       class="mt-6 inline-block px-6 py-2 text-sm font-semibold text-white bg-pink-400 hover:bg-pink-500 rounded-lg transition duration-200 ease-in-out shadow-md">
        Kembali ke Beranda
    </a>
</div>
@endsection
