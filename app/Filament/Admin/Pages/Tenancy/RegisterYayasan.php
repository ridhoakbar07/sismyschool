<?php
namespace App\Filament\Admin\Pages\Tenancy;
 
use App\Models\Yayasan;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
 
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
                TextInput::make('nama'),
                TextInput::make('slug'),
                // ...
            ]);
    }
    
    protected function handleRegistration(array $data): Yayasan
    {
        $yayasan = Yayasan::create($data);
        
        $yayasan->users()->attach(auth()->user());
        
        return $yayasan;
    }
}