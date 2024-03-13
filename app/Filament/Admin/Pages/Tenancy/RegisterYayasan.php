<?php
namespace App\Filament\Admin\Pages\Tenancy;


use App\Models\Yayasan;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Actions\Action;
use Illuminate\Support\HtmlString;

class RegisterYayasan extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Yayasan';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Yayasan')
                    ->required(),
                TextInput::make('slug')
                    ->label('Url Slug')
                    ->required(),
                Placeholder::make('')
                    ->content(new HtmlString('<b>Setelah registrasi berhasil</b><br/>Mohon perbarui data yayasan pada menu Edit Profile'))
            ]);
    }

    protected function handleRegistration(array $data): Yayasan
    {
        $yayasan = Yayasan::create($data);

        $yayasan->users()->attach(auth()->user());

        return $yayasan;
    }
}