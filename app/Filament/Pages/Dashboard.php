<?php

namespace App\Filament\Pages;

use Filament\Widgets;
use App\Filament;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Dashboard';

    protected static ?int $navigationSort = 1;

    public function getWidgets(): array
    {
        return [
            Filament\Widgets\LowStockCardWidget::class,
            Widgets\AccountWidget::class,
            Filament\Widgets\ProductChart::class,
            Filament\Widgets\BrandChart::class,
            Filament\Widgets\LowStockTableWidget::class,
        ];
    }
}
