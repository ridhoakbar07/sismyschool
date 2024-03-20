<?php

namespace App\Filament\Admin\Resources\TestaResource\Pages;

use App\Filament\Admin\Resources\TestaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestas extends ManageRecords
{
    protected static string $resource = TestaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
