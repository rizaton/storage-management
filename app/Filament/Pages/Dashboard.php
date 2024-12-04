<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LowStockCardWidget;
use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use App\Filament\Widgets\LowStockWidget;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            LowStockCardWidget::class,
            Widgets\AccountWidget::class,
            LowStockWidget::class,
        ];
    }
}
