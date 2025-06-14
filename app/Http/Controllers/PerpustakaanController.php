<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Kategori;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;

class PerpustakaanController extends Controller
{

public function index()
{
    $rekomendasi = Book::inRandomOrder()->limit(10)->get();
    $populer = Book::orderBy('stok', 'desc')->limit(10)->get(); // misal "populer" dilihat dari stok terbanyak
    $baru = Book::orderBy('created_at', 'desc')->limit(10)->get();
    $kategoris = Kategori::all();

    return view('perpustakaan.index', compact('rekomendasi', 'populer', 'baru'));



}
public function search(Request $request)
{
    $query = $request->input('search');

    if (trim($query) == '') {
        // Tidak ada input pencarian
        return view('perpustakaan.books.search_result', [
            'books' => collect(), // kosongkan hasil
            'query' => $query
        ]);
    }

    $books = Book::with('kategori')
        ->where('judul', 'like', '%' . $query . '%')
        ->orWhere('pengarang', 'like', '%' . $query . '%')
        ->orWhereHas('kategori', function ($q) use ($query) {
            $q->where('nama', 'like', '%' . $query . '%');
        })
        ->get();

    return view('perpustakaan.books.search_result', compact('books', 'query'));
}



}
