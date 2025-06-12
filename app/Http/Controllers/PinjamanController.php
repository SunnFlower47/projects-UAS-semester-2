<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class PinjamanController extends Controller
{
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('perpustakaan.pinjaman.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_kembali' => 'required|date|after:today',
        ]);

        $book = Book::find($request->book_id);

        if ($book->stok <= 0) {
            return back()->with('error', 'Stok buku habis');
        }

        // Simpan peminjaman
        $pinjaman = Pinjaman::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        // Kurangi stok buku
        $book->decrement('stok');

        // Arahkan ke halaman bukti peminjaman
        return redirect()->route('perpustakaan.pinjaman.bukti-pinjaman', $pinjaman->id)
            ->with('success', 'Buku berhasil dipinjam');
    }

   public function bukti($id)
{
    $pinjaman = Pinjaman::with('book', 'user')->findOrFail($id);
    return view('perpustakaan.pinjaman.bukti-pinjaman', compact('pinjaman'));
}


public function downloadPDF($id)
{
    $pinjaman = Pinjaman::with(['book', 'user'])->findOrFail($id);

    $pdf = Pdf::loadView('perpustakaan.pinjaman.download-pdf', compact('pinjaman'));
    return $pdf->download('Bukti-Peminjaman-' . $pinjaman->kode_transaksi . '.pdf');
}
public function histori(Request $request)
{
    $query = Pinjaman::with(['book', 'user'])
        ->where('user_id', Auth::id())
        ->latest();

    // Filter status (jika ada dari request)
    if ($request->has('status') && in_array($request->status, ['dipinjam', 'dikembalikan', 'terlambat'])) {
        $query->where('status', $request->status);
    }

    $pinjamans = $query->paginate(5)->withQueryString(); // paginate 5 item

    // Update status jika lebih dari 7 hari
    foreach ($pinjamans as $pinjaman) {
        if ($pinjaman->status === 'dipinjam' && $pinjaman->tanggal_pinjam) {
            $tanggalPinjam = \Carbon\Carbon::parse($pinjaman->tanggal_pinjam);
            if (now()->diffInDays($tanggalPinjam) > 7) {
                $pinjaman->status = 'terlambat';
                $pinjaman->save();
            }
        }
    }

    return view('perpustakaan.pinjaman.histori-pinjaman', compact('pinjamans'));
}
public function searchHistori(Request $request)
{
    $keyword = $request->q;

    $pinjamans = Pinjaman::with('book')
    ->where('user_id', Auth::id())
    ->where(function ($query) use ($keyword) {
        $query->where('kode_transaksi', 'like', "%$keyword%")
              ->orWhereHas('book', fn($q) => $q->where('judul', 'like', "%$keyword%"));
    })
    ->latest()
    ->paginate(5)
    ->withQueryString();


    return view('perpustakaan.pinjaman.search-pinjaman', compact('pinjamans'));
}




}
