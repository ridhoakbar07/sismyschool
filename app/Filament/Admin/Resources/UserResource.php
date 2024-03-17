<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationGroup = 'Manajemen User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->options([
                        'Admin' => 'Admin',
                        'Ketua Yayasan' => 'Ketua Yayasan',
                        'Kepala Sekolah' => 'Kepala Sekolah',
                        'Bendahara' => 'Bendahara',
                        'Orang Tua' => 'Orang Tua'
                    ])
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('profile.nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\IconColumn::make('profile.id')
                    ->default(0)
                    ->boolean(),
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
                ActionGroup::make([
                    Tables\Actions\Action::make('Update Profile')
                        ->form([
                            Forms\Components\Select::make('profile_id')
                                ->label('Pilih profile yang tersedia')
                                ->relationship(
                                    name: 'profile',
                                    titleAttribute: 'nama_lengkap',
                                    modifyQueryUsing: fn(Builder $query) => $query->whereNotIn('id', User::whereNotNull('profile_id')->pluck('profile_id')),
                                )
                                ->createOptionForm([
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
                                ])
                                ->prefixIcon('heroicon-m-user-circle'),
                        ])
                        ->action(function (array $data, User $record): void {
                            $record->profile()->associate($data['profile_id']);
                            $record->save();
                        })
                        ->icon('heroicon-m-user-circle')
                        ->color('info'),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                    ->link()
                    ->label('Actions')
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
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
