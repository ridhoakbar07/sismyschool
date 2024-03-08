<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UserRoleResource\Pages;
use App\Filament\Admin\Resources\UserRoleResource\RelationManagers;
use App\Models\UserRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserRoleResource extends Resource
{
    protected static ?string $model = UserRole::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $modelLabel = 'User Roles';

    protected static ?string $navigationLabel = 'Role';

    protected static ?string $navigationGroup = 'Management';

    protected static ?string $navigationParentItem = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->sortable(),
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
            ->defaultSort('created_at', 'asc');;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUserRoles::route('/'),
        ];
    }
}
