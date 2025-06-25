<?php
namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Book;
use App\Models\Pinjaman;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Filament\Resources\AdminResource\Widgets\StatsOverview;
use Filament\Pages\Page as BaseDashboard;
use App\Filament\Resources\AdminResource\Widgets\PinjamanChart;
use App\Filament\Widgets\TopBooksChart;

class Dashboard extends BaseDashboard
{
    protected static string $view = 'filament.resources.admin-resource.pages.dashboard';

    public $labels = [];
    public $data = [];

    // public $totalBooks;
    // public $todayLoans;
    // public $totalMembers;

    // public $totalKategoris;

    public function mount()
    {
        // $this->totalBooks = Book::count();
        // $this->todayLoans = Pinjaman::whereDate('created_at', now())->count();
        // $this->totalMembers = User::count();
        // $this->totalKategoris = DB::table('kategori')->count();

    //     $this->labels = collect(range(0, 6))->map(function ($i) {
    //         return now()->subDays($i)->format('D');
    //     })->reverse()->values();

    //     $this->data = collect(range(0, 6))->map(function ($i) {
    //         return Pinjaman::whereDate('created_at', now()->subDays($i))->count();
    //     })->reverse()->values();
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            PinjamanChart::class,
            TopBooksChart::class,
        ];
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-home';
    }

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }
}

