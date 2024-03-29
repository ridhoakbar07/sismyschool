<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kelas extends Model
{
    use HasUuids, HasFactory;

    public function sekolahs(): BelongsToMany
    {
        return $this->belongsToMany(Sekolah::class, 'sekolah_kelas');
    }
}
