<?php

namespace App\Models;

use Snowflake\Snowflakes;
use Snowflake\SnowflakeCast;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefibNote extends Model
{
    use HasFactory;
    use Snowflakes;

    protected $fillable = ['note'];

    protected static function booted()
    {
        static::creating(function ($note) {
            $note->user_id = auth()->user()->id;
        });
    }

    protected $casts = [
        'id' => SnowflakeCast::class,
    ];

    public function defib(): BelongsTo
    {
        return $this->belongsTo(Defib::class);
    }
}
