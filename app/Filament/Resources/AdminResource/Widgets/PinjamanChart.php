<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Pinjaman;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PinjamanChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Peminjaman';

    protected function getType(): string
    {
        return 'bar'; // Bisa kamu ganti ke 'line' kalau mau
    }

    protected function getFilters(): ?array
    {
        return [
            'weekly' => 'Mingguan',
            'monthly' => 'Bulanan',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter; // ambil filter aktif
        $labels = [];
        $data = [];

        if ($filter === 'monthly') {
            // Ambil data per bulan (12 bulan terakhir)
            foreach (range(1, 12) as $month) {
                $labels[] = Carbon::create()->month($month)->format('M');
                $data[] = Pinjaman::whereMonth('created_at', $month)
                    ->whereYear('created_at', now()->year)
                    ->count();
            }
        } else {
            // Default ke mingguan (7 hari terakhir)
            foreach (range(6, 0) as $day) {
                $date = now()->subDays($day);
                $labels[] = $date->format('D');
                $data[] = Pinjaman::whereDate('created_at', $date)->count();
            }
        }

        return [
            'datasets' => [
                [
                    'label' => $filter === 'monthly' ? 'Peminjaman per Bulan' : 'Peminjaman per Hari',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.6)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
