<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Pinjaman;
use Filament\Widgets\ChartWidget;

class TopBooksChart extends ChartWidget
{
    protected static ?string $heading = 'Top 5 Buku Terpopuler';
    protected static ?int $sort = 7;
    protected static string $chartType = 'bar'; // Bisa diganti jadi 'pie' juga

    protected function getType(): string
    {
        return static::$chartType;
    }

    protected function getData(): array
    {
        $data = Pinjaman::selectRaw('book_id, COUNT(*) as total')
            ->groupBy('book_id')
            ->orderByDesc('total')
            ->take(5)
            ->with('book')
            ->get();

        return [
            'labels' => $data->pluck('book.judul')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Peminjaman',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => ['#7c3aed', '#4f46e5', '#06b6d4', '#22c55e', '#f97316'],
                ],
            ],
        ];
    }
}
