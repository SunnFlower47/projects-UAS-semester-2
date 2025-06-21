<?php
namespace App\Exports;

use App\Models\Pinjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PinjamanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pinjaman::with(['user', 'book'])->get()->map(function ($item) {
            return [
                'Kode Transaksi' => $item->kode_transaksi,
                'Nama Peminjam' => $item->user->name ?? '-',
                'Judul Buku' => $item->book->judul ?? '-',
                'Tanggal Pinjam' => $item->tanggal_pinjam,
                'Tanggal Kembali' => $item->tanggal_kembali,
                'Tanggal Kembali Asli' => $item->tanggal_kembali_asli,
                'Status' => $item->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Kode Transaksi',
            'Nama Peminjam',
            'Judul Buku',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Tanggal Kembali Asli',
            'Status',
        ];
    }
}
