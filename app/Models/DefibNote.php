<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\UsesUUID;
use App\Traits\StoresAuthenticatedUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefibNote extends Model
{
    use UsesUUID;
    use HasFactory;
    use StoresAuthenticatedUser;

    protected $fillable = ['note'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
