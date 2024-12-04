<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Product;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $model = Product::class;

    protected static ?string $heading = 'Stok rendah';

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query()->where('stock', '<', 5))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn(Product $record): string => $record->description)
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Jumlah Stok')
                    ->searchable()
                    ->sortable(),
            ])
            ->hiddenFilterIndicators(true)
            ->paginationPageOptions([5]);
    }
}
