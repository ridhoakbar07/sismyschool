<?php

namespace App\Filament\Admin\Resources\PosTerimaResource\Pages;

use App\Filament\Admin\Resources\PosTerimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePosTerimas extends ManageRecords
{
    protected static string $resource = PosTerimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
