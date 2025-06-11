<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_kembali_asli',
        'status',
        'kode_transaksi'
    ];

    protected static function booted()
    {
        static::creating(function ($pinjaman) {
            // Set user_id jika belum ada
            if (empty($pinjaman->user_id)) {
                $pinjaman->user_id = Auth::id();
            }

            // Generate kode_transaksi
            $date = now()->format('Ymd');
            $prefix = 'PNJ-' . $date;

            $last = static::whereDate('created_at', today())->count() + 1;
            $urutan = str_pad($last, 3, '0', STR_PAD_LEFT);

            $pinjaman->kode_transaksi = $prefix . '-' . $urutan;
        });
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Buku
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    // Relasi ke Denda (kalau kamu pakai model Denda)
    public function denda()
    {
        return $this->hasOne(Denda::class, 'pinjaman_id');
    }
}
