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
    protected static function booted()
    {
        static::creating(function ($pinjaman) {
            if (empty($pinjaman->user_id)) {
                $pinjaman->user_id = Auth::id();
            }
        });
    }
// public function book()
// {
//     return $this->belongsTo(Book::class);
// }

    protected $table = 'pinjaman';

    protected $fillable = [
    'user_id',
    'book_id',
    'tanggal_pinjam',
    'tanggal_kembali',
    'status',
];


    // Relasi ke User
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function book()
{
    return $this->belongsTo(Book::class, 'book_id');
}

    // Relasi ke Denda
    public function denda()
    {
        return $this->hasOne(Denda::class, 'pinjaman_id');
    }
}
