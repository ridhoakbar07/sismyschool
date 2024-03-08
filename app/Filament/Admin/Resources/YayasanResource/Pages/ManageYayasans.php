<?php

namespace App\Filament\Admin\Resources\YayasanResource\Pages;

use App\Filament\Admin\Resources\YayasanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageYayasans extends ManageRecords
{
    protected static string $resource = YayasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
