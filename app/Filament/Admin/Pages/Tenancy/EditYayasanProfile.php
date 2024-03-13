<?php
namespace App\Filament\Admin\Pages\Tenancy;

use App\Models\User;
use App\Models\Yayasan;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
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
        return 'Profile yayasan';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informasi Dasar')
                            ->schema([
                                TextInput::make('nama')->required(),
                                DatePicker::make('tanggal_pendirian'),
                                Textarea::make('alamat'),
                                TextInput::make('telp'),
                                TextInput::make('email'),
                            ]),
                        Tabs\Tab::make('Profil')
                            ->schema([
                                Textarea::make('visi_misi'),
                                TextInput::make('no_status_hukum'),
                                Select::make('pimpinan_id')
                                    ->label('Ketua Yayasan')
                                    ->options(User::where('role', 'Ketua Yayasan')->pluck('name', 'id'))
                                    ->searchable()
                            ])->columns(2),
                        Tabs\Tab::make('Url Slug')
                            ->schema([
                                TextInput::make('slug')
                                    ->label('url-slug')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    protected function handleRegistration(array $data): Yayasan
    {
        $yayasan = Yayasan::create($data);

        $yayasan->users()->attach(auth()->user());

        return $yayasan;
    }
}