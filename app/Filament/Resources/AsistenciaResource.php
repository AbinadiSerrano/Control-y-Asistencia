<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsistenciaResource\Pages;
use App\Filament\Resources\AsistenciaResource\RelationManagers;
use App\Models\Asistencia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsistenciaResource extends Resource
{
    protected static ?string $model = Asistencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\DateTimePicker::make('entrada')
                ->required(),
            Forms\Components\DateTimePicker::make('salida'),
            Forms\Components\TextInput::make('horas_extra')
                ->numeric()
                ->default(null),
            Forms\Components\TextInput::make('horas_descuento')
                ->numeric()
                ->default(null),
            Forms\Components\TextInput::make('empleado_id')
                ->required()
                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                    Tables\Columns\TextColumn::make('entrada')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('salida')
                        ->dateTime()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('horas_extra')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('horas_descuento')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('empleados.nombre')
                        ->label('Nombre')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('empleados.paterno')
                        ->label('A Paterno')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('empleados.materno')
                        ->label('A Materno')
                        ->sortable(),
                    
                    Tables\Columns\TextColumn::make('empleados.cargos.nombre')
                        ->label('Cargo')
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
                ])
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
            'index' => Pages\ListAsistencias::route('/'),
            'create' => Pages\CreateAsistencia::route('/create'),
            'view' => Pages\ViewAsistencia::route('/{record}'),
            'edit' => Pages\EditAsistencia::route('/{record}/edit'),
        ];
    }
}
