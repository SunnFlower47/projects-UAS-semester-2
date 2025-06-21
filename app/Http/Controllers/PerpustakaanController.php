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
    $sliderBooks = Book::latest()->take(3)->get();
    $userId = Auth::id();

    return view('perpustakaan.index', [
        'sliderBooks'   => $sliderBooks,
        'rekomendasi'   => Book::inRandomOrder()->limit(10)->get(),
        'populer'       => Book::withCount('peminjaman')->orderByDesc('peminjaman_count')->limit(10)->get(),
        'baru'          => Book::orderBy('created_at', 'desc')->limit(10)->get(),
        'kategoris'     => Kategori::all(),
        'lastLoan' => Pinjaman::with('book')
                        ->where('user_id', $userId)
                        ->latest('created_at')
                        ->first(),
        'currentLoan' => Pinjaman::with('book')
                        ->where('user_id', $userId)
                        ->whereIn('status', ['dipinjam', 'terlambat'])
                        ->orderBy('tanggal_kembali', 'asc')
                        ->orderBy('id', 'desc')
                        ->first(),
    ]);
}


    public function search(Request $request)
    {
        $query = $request->input('search');

        if (trim($query) == '') {
            return view('perpustakaan.books.search_result', [
                'books' => collect(),
                'query' => $query
            ]);
        }

        $books = Book::with('kategori')
    ->where('judul', 'like', '%' . $query . '%')
    ->orWhere('pengarang', 'like', '%' . $query . '%')
    ->orWhereHas('kategori', function ($q) use ($query) {
        $q->where('nama', 'like', '%' . $query . '%');
    })
    ->paginate(12);


        return view('perpustakaan.books.search_result', compact('books', 'query'));
    }
    public function homepageSlider()
{
    $sliderBooks = Book::latest()->take(3)->get();
    return view('homepage', compact('sliderBooks'));
}

}
