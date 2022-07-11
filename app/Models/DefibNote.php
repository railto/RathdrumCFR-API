<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefibNote extends Model
{
    use UsesUUID;
    use HasFactory;

    protected $fillable = ['note'];

    protected static function booted()
    {
        static::creating(function ($note) {
            $note->user_id = auth()->user()->id;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
