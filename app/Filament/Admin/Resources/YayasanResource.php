<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\YayasanResource\Pages;
use App\Filament\Admin\Resources\YayasanResource\RelationManagers;
use App\Models\Profile;
use App\Models\User;
use App\Models\Yayasan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class YayasanResource extends Resource
{
    protected static ?string $model = Yayasan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $modelLabel = 'Yayasan';

    protected static ?string $navigationLabel = 'Yayasan';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationGroup = 'Manajemen Umum';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_pendirian'),
                Forms\Components\Textarea::make('alamat')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('telp')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('visi_misi')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('no_status_hukum')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('pimpinan_id')
                    ->label('Ketua Yayasan')
                    ->options(Profile::where('user.role', 'Ketua Yayasan')->pluck('nama_awal', 'user_id'))
                    ->searchable()
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pendirian')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_status_hukum')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pimpinan_id')
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
            'index' => Pages\ManageYayasans::route('/'),
        ];
    }
}
