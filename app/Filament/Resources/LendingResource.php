<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LendingResource\RelationManagers\PostsRelationManager;
use App\Filament\Resources\LendingResource\Pages;
use App\Filament\Resources\LendingResource\RelationManagers;
use App\Models\Lending;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LendingResource extends Resource
{
    protected static ?string $model = Lending::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Peminjaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('user_id')
                        ->relationship('user', 'name'),
                    DatePicker::make('lendingdate'),
                    DatePicker::make('returndate'),
                    TextInput::make('totalitems'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->getStateUsing(
                    static function ($rowLoop, HasTable $livewire): string {
                        return (string) ($rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * ($livewire->page - 1
                            ))
                        );
                    }
                ),
                TextColumn::make('user.name'),
                TextColumn::make('lendingdate'),
                TextColumn::make('returndate'),
                TextColumn::make('totalitems')
            ])
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

            PostsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLendings::route('/'),
            'create' => Pages\CreateLending::route('/create'),
            'edit' => Pages\EditLending::route('/{record}/edit'),
        ];
    }
}
