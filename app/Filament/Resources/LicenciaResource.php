<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LicenciaResource\Pages;
use App\Filament\Resources\LicenciaResource\RelationManagers;
use App\Models\Licencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LicenciaResource extends Resource
{
    protected static ?string $model = Licencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tipo_licencia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_final')
                    ->required(),
                Forms\Components\Select::make('estado')
                    ->options([
                        'M' => 'Aprobado',
                        'F' => 'No Aprobado',
                     ])
                    ->required(),
                Forms\Components\Select::make('empleado_id')
                    ->relationship('empleados','CI')
                    ->label('CI')
                    ->searchable()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tipo_licencia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_final')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('empleados.nombre')
                    ->label('Nombre')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('empleados.paterno')
                    ->label('Apellido Paterno')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('empleados.materno')
                    ->label('Apellido Materno')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLicencias::route('/'),
            'create' => Pages\CreateLicencia::route('/create'),
            'view' => Pages\ViewLicencia::route('/{record}'),
            'edit' => Pages\EditLicencia::route('/{record}/edit'),
        ];
    }
}
