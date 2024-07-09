<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpleadoResource\Pages;
use App\Filament\Resources\EmpleadoResource\RelationManagers;
use App\Models\Empleado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmpleadoResource extends Resource
{
    protected static ?string $model = Empleado::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CI')
                    ->label('CI')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('paterno')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('materno')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->required(),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('genero')
                    ->options([
                    'M' => 'Masculino',
                    'F' => 'Femenino',
                     ])
                    ->required(),
                Forms\Components\FileUpload::make('image_url')
                    ->image()
                    ->preserveFilenames()
                    ->imageEditor()
                    ->visibility('public') 
                    ->required(),
                Forms\Components\Select::make('cargo_id')
                    ->relationship('cargos','nombre')
                    ->required(),
                Forms\Components\Select::make('horario_id')
                    ->relationship('horarios','turno')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_contrato')
                    ->required(),
                Forms\Components\TextInput::make('sueldo')
                    ->numeric(),
                Forms\Components\TextInput::make('descuentodia')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CI')
                    ->label('CI')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paterno')
                    ->label('Apellido Paterno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('materno')
                    ->label('Apellido Materno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genero')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image_url')
                    ->rounded()
                    ->label('foto')
                    ->size(75),
                Tables\Columns\TextColumn::make('cargos.nombre')
                    ->label('Cargo'),
                Tables\Columns\TextColumn::make('horarios.turno')
                    ->label('Turno'),
                Tables\Columns\TextColumn::make('fecha_contrato')
                    ->label('Fecha Contratacion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sueldo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descuentodia')
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
            'index' => Pages\ListEmpleados::route('/'),
            'create' => Pages\CreateEmpleado::route('/create'),
            'view' => Pages\ViewEmpleado::route('/{record}'),
            'edit' => Pages\EditEmpleado::route('/{record}/edit'),
        ];
    }
}
