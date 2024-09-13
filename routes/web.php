<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\LogoutResponse;


if (config('website.route.home') !== false) {
    Route::get('/', function () {
        // return config('website.view.home') ? view(config('website.view.home')) :  view('website.home');
        return redirect()->route('login');
    });
}

Route::post('logout', function () {
    $user = auth()->logout();
    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return app(LogoutResponse::class);
})->name('logout');
