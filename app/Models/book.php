<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'books';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'stok',
        'kategori_id',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke pinjaman
    public function pinjamans()
    {
        return $this->hasMany(Pinjaman::class, 'book_id');
    }
}
