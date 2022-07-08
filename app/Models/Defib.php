<?php

namespace App\Models;

use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defib extends Model
{
    use HasFactory;
    use Snowflakes;

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
        'id' => SnowflakeCast::class,
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

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('display_on_map', true);
    }
}
