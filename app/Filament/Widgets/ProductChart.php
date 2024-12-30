<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use Filament\Widgets\ChartWidget;

class ProductChart extends ChartWidget
{
    protected static ?string $heading = 'Low Product each Brand';

    protected static ?string $pollingInterval = '120s';

    protected static string $color = 'warning';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => Brand::withCount(['products' => function ($query) {
                        $query->where('stock', '<', 5);
                    }])->pluck('products_count')->toArray(),
                ],
            ],
            'labels' => Brand::select('name')->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
