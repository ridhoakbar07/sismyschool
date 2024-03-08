<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Login as Administrator')
                    ->id('loginAsAdmin')
                    ->description('Klik tombol disamping jika ingin pergi ke halaman dashboard admin')
                    ->headerActions([
                        Action::make('Login')
                            ->icon('heroicon-m-lock-closed')
                            ->url(fn (): string => route('filament.admin.auth.login')),
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