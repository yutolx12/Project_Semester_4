<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnergyResource\Pages;
use App\Filament\Resources\EnergyResource\RelationManagers;
use App\Models\Energy;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnergyResource extends Resource
{
    protected static ?string $model = Energy::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Penggunaan Daya';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('ampere'),
                    TextInput::make('voltage'),
                    TextInput::make('watt'),
                    TextInput::make('ruangan'),
                    DateTimePicker::make('update_time')

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('ampere'),
                TextColumn::make('voltage'),
                TextColumn::make('watt'),
                TextColumn::make('ruangan'),
                TextColumn::make('update_time'),
            ])
            ->defaultsort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEnergies::route('/'),
            'create' => Pages\CreateEnergy::route('/create'),
            'edit' => Pages\EditEnergy::route('/{record}/edit'),
        ];
    }
}
