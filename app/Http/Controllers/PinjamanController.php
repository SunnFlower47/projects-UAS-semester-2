<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    public function create(Book $book)
    {
        // Tampilkan form pinjam buku dengan data $book
        return view('pinjaman.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_kembali' => 'required|date|after_or_equal:today',
        ]);

        Pinjaman::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'tanggal_pinjam' => now()->format('Y-m-d'),
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('dashboard')->with('success', 'Buku berhasil dipinjam.');
    }
}
