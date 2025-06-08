<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Book;
use App\Models\pinjaman;
use App\Models\User;
use Filament\Facades\Filament;
use App\Models\Kategori;



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
                ->url(route('filament.admin.resources.pinjaman.index'))
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
        ];
    }
}
