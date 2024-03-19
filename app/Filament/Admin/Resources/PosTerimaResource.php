<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PosTerimaResource\Pages;
use App\Filament\Admin\Resources\PosTerimaResource\RelationManagers;
use App\Models\PosTerima;
use App\Models\Sekolah;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class PosTerimaResource extends Resource
{
    protected static ?string $model = PosTerima::class;

    protected static ?string $navigationIcon = 'heroicon-o-wallet';

    protected static ?string $modelLabel = 'Pos Terima';

    protected static ?string $navigationLabel = 'Pos Terima';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Referensi Kas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sekolah_id')
                    ->options(Sekolah::query()->pluck('nama', 'id'))
                    ->dehydrated(false)
                    ->live(),
                Forms\Components\Select::make('unit_id')
                    ->options(fn(Get $get): Collection => Unit::query()
                        ->where('sekolah_id', $get('sekolah_id'))
                        ->pluck('nama_unit', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('nama_pos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('biaya')
                    ->numeric()
                    ->inputMode('decimal')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('unit.sekolah.nama')
                    ->label('Nama Sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit.nama_unit')
                    ->label('Nama Unit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_pos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya')
                    ->prefix('Rp. ')
                    ->numeric(decimalPlaces: 2),
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->groups([
                Group::make('unit.nama_unit')
                ->collapsible(),
                // 'unit.sekolah.nama',
                // 'unit.nama_unit',
            ]);
            // ->defaultGroup('unit.sekolah.nama');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePosTerimas::route('/'),
        ];
    }
}
