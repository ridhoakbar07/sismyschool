<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class LoginAsUser extends BaseLogin
{
    public function getTitle(): string|Htmlable
    {
        return __('Admin Dashboard - Sign in');
    }

    public function getHeading(): string
    {
        return __('Login as Administrator');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Login as Wali Murid')
                    ->id('loginAsUser')
                    ->description('Klik tombol disamping jika ingin pergi ke halaman dashboard User')
                    ->headerActions([
                        Action::make('Login')
                            ->icon('heroicon-m-academic-cap')
                            ->url(fn(): string => route('filament.app.auth.login')),
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