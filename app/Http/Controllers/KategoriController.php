<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Kategori;


class KategoriController extends Controller
{
    public function filterByKategori($nama)
{
     $kategori = Kategori::where('nama', $nama)->firstOrFail();
    $books = Book::where('kategori_id', $kategori->id)->paginate(10);

    return view('perpustakaan.books.kategori', compact('books', 'kategori'));
}
}
