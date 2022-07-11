<?php

declare(strict_types=1);

namespace App\Traits;

trait StoresAuthenticatedUser
{
    protected static function booting(): void
    {
        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = auth()->user()->id;
            }
        });
    }
}
