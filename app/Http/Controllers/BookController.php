<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with('kategori')->findOrFail($id);
        return view('perpustakaan.books.show', compact('book'));
    }

    public function daftarBuku(Request $request)
    {
        $books = Book::with('kategori')
            ->when($request->kategori, function ($query) use ($request) {
                $query->where('kategori_id', $request->kategori);
            })
            ->when($request->genre, function ($query) use ($request) {
                $query->whereHas('kategori', function ($query) use ($request) {
                    $query->where('genre', $request->genre);
                });
            })
            ->paginate(10)
            ->appends($request->only('kategori', 'genre')); // supaya filter tetap nyangkut saat pindah halaman

        $allKategori = Kategori::all();
        $allGenre = Kategori::select('genre')->distinct()->pluck('genre');

        return view('perpustakaan.books.daftar_buku', compact('books', 'allKategori', 'allGenre'));
    }
}
