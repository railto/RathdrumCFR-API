<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Defib extends Model
{
    use UsesUUID;
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'coordinates',
        'display_on_map',
        'model',
        'serial',
        'owner',
        'last_inspected_at',
        'last_inspected_by',
        'last_serviced_at',
        'pads_expire_at'
    ];

    protected $casts = [
        'last_inspected_at' => 'datetime:Y-m-d',
        'pads_expire_at' => 'datetime:Y-m-d',
        'last_serviced_at' => 'datetime:Y-m-d',
        'display_on_map' => 'boolean',
        'serial' => 'string',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(DefibNote::class);
    }

    public function inspections(): HasMany
    {
        return $this->hasMany(DefibInspection::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('display_on_map', true);
    }
}
