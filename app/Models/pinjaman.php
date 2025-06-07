<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    protected $fillable = [
        'pengguna_id',
        'Book_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_kembali_asli',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

    // Relasi ke Book
    public function Book()
    {
        return $this->belongsTo(Book::class, 'Book_id');
    }

    // Relasi ke Denda
    public function denda()
    {
        return $this->hasOne(Denda::class, 'pinjaman_id');
    }
}
