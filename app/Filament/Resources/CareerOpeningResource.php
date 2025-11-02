<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CareerOpeningResource\Pages;
use App\Filament\Resources\CareerOpeningResource\RelationManagers;
use App\Models\CareerOpening;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CareerOpeningResource extends Resource
{
    protected static ?string $model = CareerOpening::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                Select::make('type')->options([
                    'stage' => 'Stage',
                    'emploi' => 'Emploi',
                ])->required(),
                Textarea::make('description')->columnSpanFull(),
                TextInput::make('location'),
                Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('type'),
                TextColumn::make('location'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCareerOpenings::route('/'),
            'create' => Pages\CreateCareerOpening::route('/create'),
            'edit' => Pages\EditCareerOpening::route('/{record}/edit'),
        ];
    }
}
