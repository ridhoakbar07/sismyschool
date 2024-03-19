<?php

namespace App\Filament\Admin\Resources\SekolahResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitRelationManager extends RelationManager
{
    protected static string $relationship = 'units';

    protected static ?string $modelLabel = 'Unit';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nama_unit')
                    ->options([
                        'Paud' => 'Paud',
                        'SD' => 'Sekolah Dasar',
                        'SMP' => 'Sekolah Menengah Pertama',
                        'SMA' => 'Sekolah Menengah Atas',
                    ])
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_unit')
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama_unit')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('jenis')
                //     ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Register Unit'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
