@extends('layouts.perpus')

@section('content')
<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Pinjam Buku: {{ $book->judul }}</h2>

    <form method="POST" action="{{ route('pinjaman.store') }}">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div class="mb-4">
            <label for="tanggal_kembali" class="block text-gray-700 font-semibold mb-2">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Pinjam Sekarang
        </button>
    </form>
</div>
@endsection
