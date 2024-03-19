<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sekolah extends Model
{
    use HasUuids, HasFactory;

    public function yayasan(): BelongsTo
    {
        return $this->belongsTo(Yayasan::class);
    }

    public function kepsek(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kepsek_id');
    }

    public function bendahara(): BelongsTo
    {
        return $this->belongsTo(User::class, 'bendahara_id');
    }

    public function unitkelas(): HasMany
    {
        return $this->hasMany(UnitKelas::class);
    }
}
