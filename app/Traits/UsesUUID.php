<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;

trait UsesUUID
{
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }
}
