<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $buku = Book::with('kategori')->findOrFail($id);

        $book = Book::with('kategori')->findOrFail($id); // ambil buku dari DB
    return view('perpustakaan.books.show', compact('book')); // kirim ke view
    }
}
