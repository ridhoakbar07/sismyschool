<?php
namespace App\Filament\Admin\Pages\Tenancy;

use App\Models\User;
use App\Models\Yayasan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class EditYayasanProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Edit Profile Yayasan';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('nama'),
                        DatePicker::make('tanggal_pendirian'),
                        Textarea::make('alamat'),
                        TextInput::make('telp'),
                        TextInput::make('email'),
                        TextInput::make('slug')
                            ->label('url-slug'),
                    ]),
                    Section::make([
                        Textarea::make('visi_misi'),
                        TextInput::make('no_status_hukum'),
                        Select::make('pimpinan_id')
                            ->label('Ketua Yayasan')
                            ->options(User::where('role', 'Ketua Yayasan')->pluck('name', 'id'))
                            ->searchable()
                    ])->grow(true),
                ])->from('md')
            ]);
    }

    protected function handleRegistration(array $data): Yayasan
    {
        $yayasan = Yayasan::create($data);

        $yayasan->users()->attach(auth()->user());

        return $yayasan;
    }
}