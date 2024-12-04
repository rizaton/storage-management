<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class LowStockCardWidget extends BaseWidget
{

    //heroicon-o-exclamation-triangle

    protected int | string | array $columnSpan = '1/2';

    protected function getStats(): array
    {
        return [
            Stat::make('No Product', Product::where('stock', '<', 1)->count())
                ->descriptionIcon('heroicon-o-exclamation-circle', 'before')
                ->description('No stock')
                ->color('danger'),
            Stat::make('Low Product', Product::where('stock', '>=', 1)->where('stock', '<', 5)->count())
                ->description('Low Stock')
                ->descriptionIcon('heroicon-o-exclamation-triangle', 'before')
                ->color('warning'),
            Stat::make('Product Ready', Product::where('stock', '>', 4)->count())
                ->description('Stock Ready')
                ->descriptionIcon('heroicon-o-check-circle', 'before')
                ->color('info'),
        ];
    }
}
