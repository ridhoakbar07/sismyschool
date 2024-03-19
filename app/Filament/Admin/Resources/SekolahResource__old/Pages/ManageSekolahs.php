<?php

namespace App\Filament\Admin\Resources\SekolahResource\Pages;

use App\Filament\Admin\Resources\SekolahResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSekolahs extends ManageRecords
{
    protected static string $resource = SekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
