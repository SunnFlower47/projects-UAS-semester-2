<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Book;
use App\Models\Denda;
use Carbon\Carbon;

class Pinjaman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pinjaman';

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
        'tanggal_kembali_asli' => 'datetime',
    ];

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
            if (empty($pinjaman->user_id)) {
                $pinjaman->user_id = Auth::id();
            }

            $date = now()->format('Ymd');
            $prefix = "PNJ-{$date}";
            $last = static::whereDate('created_at', today())->count() + 1;
            $urutan = str_pad($last, 3, '0', STR_PAD_LEFT);
            $pinjaman->kode_transaksi = "{$prefix}-{$urutan}";
        });

        static::updated(function ($pinjaman) {
            if ($pinjaman->status === 'terlambat') {
                $pinjaman->cekDanBuatDenda();
            }
        });


    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function denda()
    {
        return $this->hasOne(Denda::class, 'pinjaman_id');
    }

   public function cekDanBuatDenda()
{
    if (!$this->tanggal_kembali) {
        return;
    }

    if ($this->status === 'terlambat' && !$this->denda()->exists()) {
        $jatuhTempo = $this->tanggal_kembali->copy()->endOfDay();
        $hariTerlambat = $jatuhTempo->diffInDays(now(), false);

        if ($hariTerlambat > 0) {
            $this->denda()->create([
                'jumlah' => $hariTerlambat * 1000,
                'sudah_dibayar' => false,
            ]);
        }
    }
}







    public function isTerlambat(): bool
    {
        return $this->status === 'terlambat';
    }

    public function scopeTerlambat($query)
    {
        return $query->where('status', 'terlambat');
    }
}
