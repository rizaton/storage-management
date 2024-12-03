<?php

namespace App\Filament\Pages;

use Filament\Panel;
use App\Models\User;
use Filament\Widgets;
use App\Filament\Widgets\LowProduct;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Dashboard';

    public function getWidgets(): array
    {
        return [
            Widgets\AccountWidget::class,
            LowProduct::class,
        ];
    }
}
