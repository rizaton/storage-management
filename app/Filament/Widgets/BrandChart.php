<?php

namespace App\Filament\Widgets;

use App\Models\Brand;
use Filament\Widgets\ChartWidget;

class BrandChart extends ChartWidget
{
    protected static ?string $heading = 'Total Products each Brand';

    protected static ?string $pollingInterval = '120s';

    protected static string $color = 'info';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => Brand::withCount('products')->pluck('products_count')->toArray(),
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
