<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProfileResource\Pages;
use App\Filament\Admin\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $modelLabel = 'Profile';

    protected static ?string $navigationLabel = 'Profile';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Manajemen User';

    protected static ?string $navigationParentItem = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_awal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_akhir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\Select::make('user_id')
                //     ->relationship(name: 'user', titleAttribute: 'name')
                //     ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->name} | email : {$record->email}")
                //     ->searchable()
                //     ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No.')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama_awal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_akhir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                // Tables\Columns\IconColumn::make('user.id')
                //     ->default(0)
                //     ->boolean()
                //     ->action(
                //         Action::make('updateUser')
                //             ->form([
                //                 Forms\Components\Select::make('userId')
                //                     ->label('Profile')
                //                     ->options(User::all()->pluck('email', 'id')),
                //             ])
                //             ->action(function (array $data, Profile $record): void {
                //                 $record->user()->associate($data['userId']);
                //                 $record->save();
                //             })
                //     ),
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
            'index' => Pages\ManageProfiles::route('/'),
        ];
    }
}
