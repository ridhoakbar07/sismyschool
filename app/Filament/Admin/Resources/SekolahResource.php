<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SekolahResource\Pages;
use App\Filament\Admin\Resources\SekolahResource\RelationManagers;
use App\Models\Sekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SekolahResource extends Resource
{
    protected static ?string $model = Sekolah::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $modelLabel = 'Sekolah';

    protected static ?string $navigationLabel = 'Sekolah';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Manajemen Umum';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telp')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('yayasan_id')
                            ->relationship('yayasan', 'nama')
                            ->required(),
                        Forms\Components\Textarea::make('alamat')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\FieldSet::make('Pengelola')
                            ->schema([
                                Forms\Components\Select::make('kepsek_id')
                                    ->label('Kepala Sekolah')
                                    ->relationship(
                                        name: 'kepsek',
                                        modifyQueryUsing: fn(Builder $query) => $query->where('role', '=', 'Kepala Sekolah'),
                                    )
                                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->profile->nama_lengkap}")
                                    ->required()
                                    ->preload()
                                    ->searchable(),
                                Forms\Components\Select::make('bendahara_id')
                                    ->label('Bendahara')
                                    ->relationship(
                                        name: 'bendahara',
                                        modifyQueryUsing: fn(Builder $query) => $query->where('role', '=', 'Bendahara'),
                                    )
                                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->profile->nama_lengkap}")
                                    ->required()
                                    ->preload()
                                    ->searchable(),
                            ]),
                    ])->columnSpan(2)->columns(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make("Kategori")
                            ->collapsible()
                            ->schema([
                                Forms\Components\Select::make('unit')
                                    ->options([
                                        'Utama' => 'Utama',
                                        'Cabang' => 'Cabang',
                                    ])
                                    ->required(),
                                Forms\Components\Select::make('tingkat_pendidikan')
                                    ->options([
                                        'PAUD' => 'PAUD',
                                        'SD' => 'SD',
                                        'SMP' => 'SMP',
                                        'SMA' => 'SMA',
                                    ])
                                    ->required(),
                            ])->columnSpan(1),
                        Forms\Components\Section::make()
                            ->description('Asosiasikan kelas untuk sekolah ini :')
                            ->collapsible()
                            ->schema([
                                Forms\Components\Select::make('kelas')
                                    ->helperText('* Multiple select')
                                    ->multiple()
                                    ->relationship(name: 'kelas', titleAttribute: 'nama_kelas')
                                    ->preload()
                            ])->columnSpan(1),
                    ]),
            ])
            ->columns([
                'default' => 3,
                'sm' => 3,
                'md' => 3,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama')
                    ->description(fn(Sekolah $record): string => "Alamat : {$record->alamat} | Telp: {$record->telp}")
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat_pendidikan')
                    ->label('Tingkat'),
                Tables\Columns\TextColumn::make('unit'),
                Tables\Columns\TextColumn::make('kepsek.profile.nama_lengkap')
                    ->label('Kepala Sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bendahara.profile.nama_lengkap')
                    ->label('Bendahara')
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
            ->defaultGroup('yayasan.nama')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSekolahs::route('/'),
        ];
    }
}
