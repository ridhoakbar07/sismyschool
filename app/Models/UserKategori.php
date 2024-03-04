<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserKategori extends Model
{
    use HasUuids, HasFactory;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
