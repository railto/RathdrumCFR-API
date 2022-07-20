<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/admin/{any?}', function () {
    return view('admin');
});

Route::get('/{any?}', function () {
    return view('app');
});
