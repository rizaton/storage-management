<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use function PHPSTORM_META\map;
use Filament\Resources\Resource;
use Filament\Forms\FormsComponent;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;

use Filament\Pages\Dashboard\Actions\FilterAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;
use Illuminate\Contracts\View\View;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Inventory';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Product Name')
                        ->minLength(2)
                        ->maxLength(255)
                        ->required()
                        ->autocomplete(false),
                    Forms\Components\TextInput::make('stock')
                        ->numeric()
                        ->label('Stock Quantity')
                        ->minLength(1)
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->label('Product slug')
                        ->minLength(2)
                        ->maxLength(255)
                        ->required()
                        ->autocomplete(false),
                    Forms\Components\Select::make('brand_id')
                        ->label('Brand Name')
                        ->relationship('brand', 'name')
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->label('Brand Name')
                                ->minLength(2)
                                ->maxLength(255)
                                ->required(),
                            Forms\Components\TextInput::make('slug')
                                ->label('Brand slug')
                                ->minLength(2)
                                ->maxLength(255)
                                ->required()
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('description')
                ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table

            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->description(fn(Product $record): string => $record->description)
                    ->label('Product Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->label('Brand Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->label('Stock Quantity')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
            ])
            ->heading('Products')
            ->filters([
                Tables\Filters\SelectFilter::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label('Brand'),
                Tables\Filters\QueryBuilder::make()
                    ->constraints([
                        Tables\Filters\QueryBuilder\Constraints\DateConstraint::make('created_at'),
                        Tables\Filters\QueryBuilder\Constraints\DateConstraint::make('updated_at')
                    ]),
            ])->filtersFormWidth('md')
            ->hiddenFilterIndicators(true)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('detail_product')
                        ->modalContent(
                            fn(Product $record): View => view(
                                'filament.pages.actions.product',
                                ['record' => $record]
                            )
                        )->modalSubmitAction(false)
                        ->label('Detail')
                        ->icon('heroicon-o-document-text'),
                    Tables\Actions\EditAction::make()
                        ->slideOver(true),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
