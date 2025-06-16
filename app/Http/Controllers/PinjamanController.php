<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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
    return $pdf->download("Bukti-Peminjaman-{$pinjaman->kode_transaksi}.pdf");
}


public function riwayat(Request $request)
{
    // Periksa dan update status terlambat
    Pinjaman::where('user_id', Auth::id())
        ->where('status', 'dipinjam')
        ->get()
        ->each(function ($pinjaman) {
            if ($pinjaman->tanggal_kembali && now()->greaterThan(Carbon::parse($pinjaman->tanggal_kembali)->endOfDay())) {
                $pinjaman->status = 'terlambat';
                $pinjaman->save();
            }
        });

    $query = Pinjaman::with(['book', 'user'])
        ->where('user_id', Auth::id());

    // FILTER: Status
    if ($request->filled('status') && in_array($request->status, ['dipinjam', 'dikembalikan', 'terlambat'])) {
        $query->where('status', $request->status);
    }

    // FILTER: Search query
    if ($request->filled('q')) {
        $query->where(function ($q) use ($request) {
            $q->where('kode_transaksi', 'like', "%{$request->q}%")
              ->orWhereHas('book', function ($q2) use ($request) {
                  $q2->where('judul', 'like', "%{$request->q}%");
              });
        });
    }

    $pinjamans = $query->latest()->paginate(12)->withQueryString();

    return view('perpustakaan.pinjaman.riwayat-pinjaman', compact('pinjamans'));
}
public function searchRiwayat(Request $request)
{
    $pinjamans = Pinjaman::with('book')
        ->where('user_id', Auth::id())
        ->when($request->q, fn($q) => $q
            ->where('kode_transaksi', 'like', "%{$request->q}%")
            ->orWhereHas('book', fn($q2) => $q2->where('judul', 'like', "%{$request->q}%"))
        )
        ->when($request->status, fn($q) => $q->where('status', $request->status))
        ->orderByDesc('tanggal_pinjam')
        ->paginate(12)
        ->appends($request->all()); // ini jaga query string tetap nempel

    // Kalau request AJAX, kirim partial aja
    if ($request->ajax()) {
    return view('perpustakaan.pinjaman._search-riwayat', compact('pinjamans'));
}


    // Kalau bukan AJAX, render riwayat normal (bukan redirect ya)
    return view('perpustakaan.pinjaman.riwayat-pinjaman', compact('pinjamans'));
}



public function detail($id)
{
    $pinjaman = Pinjaman::with(['book.kategori'])->findOrFail($id);
    return view('perpustakaan.pinjaman.detail', compact('pinjaman'));
}



}
