<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\SiswaResource\Pages;
use App\Filament\App\Resources\SiswaResource\RelationManagers;
use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $modelLabel = 'Siswa';

    protected static ?string $navigationLabel = 'Siswa';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Manajemen Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NISN')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-Laki' => 'Laki - Laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\Select::make('sekolah_id')
                    ->options(Sekolah::query()->pluck('nama', 'id'))
                    ->dehydrated(false)
                    ->live(),
                Forms\Components\Select::make('unit_id')
                    ->options(fn(Get $get): Collection => Unit::query()
                        ->where('sekolah_id', $get('sekolah_id'))
                        ->pluck('nama_unit', 'id'))
                    ->dehydrated(false)
                    ->live(),
                Forms\Components\Select::make('kelas_id')
                    ->options(fn(Get $get): Collection => Kelas::query()
                        ->where('unit_id', $get('unit_id'))
                        ->pluck('nama_kelas', 'id'))
                    ->live(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('NISN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('kelas.nama_kelas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('orangTua.profile.nama_lengkap')
                    ->searchable(),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiswas::route('/'),
        ];
    }
}
