<?php

namespace App\Models;

use App\Traits\UsesUUID;
use App\Traits\StoresAuthenticatedUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DefibInspection extends Model
{
    use UsesUUID;
    use HasFactory;
    use StoresAuthenticatedUser;

    protected $fillable = ['member_id', 'inspected_at', 'pads_expire_at', 'notes'];

    protected $casts = [
        'inspected_at' => 'date:Y-m-d',
        'pads_expire_at' => 'date:Y-m-d',
    ];
}
