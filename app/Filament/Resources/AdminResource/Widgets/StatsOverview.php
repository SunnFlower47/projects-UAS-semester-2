<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Book;
use App\Models\pinjaman;
use App\Models\User;
use Filament\Facades\Filament;
use App\Models\Kategori;
use App\Filament\Resources\PinjamanResource;
use App\Models\Denda;




class StatsOverview extends BaseWidget
{
    protected function getStats(): array
{
    return [
        Stat::make('Total Buku', Book::count())
            ->description('Jumlah seluruh buku')
            ->color('primary')
            ->url(route('filament.admin.resources.books.index'))
            ->icon('heroicon-s-book-open'),

        Stat::make('Peminjaman Hari Ini', pinjaman::whereDate('created_at', today())->count())
            ->description('Data hari ini')
            ->color('success')
            ->url(PinjamanResource::getUrl())
            ->icon('heroicon-s-book-open'),

        Stat::make('Total Anggota', User::count())
            ->description('Jumlah user')
            ->color('warning')
            ->url(route('filament.admin.resources.users.index'))
            ->icon('heroicon-s-users'),

        Stat::make('Total Kategori', Kategori::count())
            ->description('Jumlah kategori buku')
            ->color('info')
            ->url(route('filament.admin.resources.kategoris.index'))
            ->icon('heroicon-s-tag'),

        Stat::make('Pengembalian Menunggu Validasi', pinjaman::where('status', 'menunggu_validasi')->count())
            ->description('Perlu diproses admin')
            ->color('secondary')
            ->icon('heroicon-s-exclamation-circle'),

        Stat::make('Buku belum di kembalikan', pinjaman::where('status', 'terlambat')->count())
            ->description('Pinjaman yang terlambat dikembalikan')
            ->color('danger')
            ->icon('heroicon-s-clock'),

        Stat::make('Total Denda Masuk', 'Rp ' . number_format(
            Denda::where('sudah_dibayar', true)->sum('jumlah'), 0, ',', '.'
            ))
            ->description('Denda yang sudah dibayar')
            ->color('success')
            ->icon('heroicon-s-currency-dollar'),
        Stat::make('Total Denda Keluar', 'Rp ' . number_format(
            Denda::where('sudah_dibayar', false)->sum('jumlah'), 0, ',', '.'
            ))
            ->description('Denda yang belum dibayar')
            ->color('warning')
            ->icon('heroicon-s-currency-dollar'),
       Stat::make('Peminjaman Aktif', Pinjaman::where('status', 'dipinjam')->count())
            ->description('Buku yang masih dipinjam user')
            ->color('warning')
            ->icon('heroicon-s-bookmark')
            ->url(PinjamanResource::getUrl())
    ];
}

    }

