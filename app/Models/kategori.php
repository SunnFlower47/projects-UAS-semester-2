<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    // Relasi ke Book
    public function books()
    {
        return $this->hasMany(Book::class, 'kategori_id');
    }
}
