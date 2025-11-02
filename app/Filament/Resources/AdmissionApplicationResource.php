<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdmissionApplicationResource\Pages;
use App\Filament\Resources\AdmissionApplicationResource\RelationManagers;
use App\Models\AdmissionApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdmissionApplicationResource extends Resource
{
    protected static ?string $model = AdmissionApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->disabled(),
                TextInput::make('last_name')->disabled(),
                TextInput::make('email')->disabled(),
                TextInput::make('phone')->disabled(),
                DatePicker::make('birth_date')->disabled(),
                Select::make('program_id')->relationship(name: 'program', titleAttribute: 'title')->disabled(),
                SpatieMediaLibraryFileUpload::make('bac_diploma')->collection('bac_diploma')->disabled(),
                SpatieMediaLibraryFileUpload::make('birth_certificate')->collection('birth_certificate')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->label('Nom complet')->getStateUsing(fn($record) => $record->first_name.' '.$record->last_name),
                TextColumn::make('program.title')->label('Filière'),
                SelectColumn::make('status')->options([
                    'pending' => 'En attente',
                    'approved' => 'Approuvée',
                    'rejected' => 'Rejetée',
                ]),
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
            'index' => Pages\ListAdmissionApplications::route('/'),
            'create' => Pages\CreateAdmissionApplication::route('/create'),
            'edit' => Pages\EditAdmissionApplication::route('/{record}/edit'),
        ];
    }
}
