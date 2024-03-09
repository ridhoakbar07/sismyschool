<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class LoginAsAdmin extends BaseLogin
{

    public function getTitle(): string|Htmlable
    {
        return __('User Dashboard - Sign in');
    }

    public function getHeading(): string
    {
        return __('Login as wali murid');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Login as Administrator')
                    ->id('loginAsAdmin')
                    ->description('Klik tombol disamping jika ingin pergi ke halaman dashboard admin')
                    ->headerActions([
                        Action::make('Login')
                            ->icon('heroicon-m-identification')
                            ->url(fn(): string => route('filament.admin.auth.login')),
                    ])
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->collapsible(),
            ]);
    }
}