<?php

namespace App\Filament\Admin\Resources\UserRoleResource\Pages;

use App\Filament\Admin\Resources\UserRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUserRoles extends ManageRecords
{
    protected static string $resource = UserRoleResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make()->label('New'),
    //     ];
    // }
}
