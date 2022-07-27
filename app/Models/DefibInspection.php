<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\UsesUUID;
use App\Traits\StoresAuthenticatedUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DefibInspection extends Model
{
    use UsesUUID;
    use HasFactory;
    use SoftDeletes;
    use StoresAuthenticatedUser;

    protected $fillable = ['member_id', 'inspected_at', 'pads_expire_at', 'notes'];

    protected $casts = [
        'inspected_at' => 'date:Y-m-d',
        'pads_expire_at' => 'date:Y-m-d',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
