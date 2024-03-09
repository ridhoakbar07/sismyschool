<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Yayasan extends Model implements HasName
{
    use HasUuids, HasFactory;

    public function getFilamentName(): string
    {
        return "{$this->nama}";
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
