<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Product;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockTableWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?string $model = Product::class;

    protected static ?string $heading = 'Low Product Stock';

    public function table(Table $table): Table
    {
        return $table
            ->query(Product::query()->where('stock', '<', 5))
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn(Product $record): string => $record->description)
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Stock Quantity')
                    ->searchable()
                    ->sortable(),
            ])
            ->hiddenFilterIndicators(true)
            ->paginationPageOptions([5])
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label('Brand'),
                Tables\Filters\QueryBuilder::make()
                    ->constraints([
                        Tables\Filters\QueryBuilder\Constraints\DateConstraint::make('created_at'),
                        Tables\Filters\QueryBuilder\Constraints\DateConstraint::make('updated_at')
                    ]),
            ])->filtersFormWidth('md');
    }
}
