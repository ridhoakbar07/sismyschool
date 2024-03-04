<?php

namespace App\Filament\Resources\YayasanResource\Pages;

use App\Filament\Resources\YayasanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateYayasan extends CreateRecord
{
    protected static string $resource = YayasanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'record saved successfully!';
    }
}
