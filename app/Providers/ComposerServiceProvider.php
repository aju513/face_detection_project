<?php

namespace App\Providers;

use App\View\Composers\MenuComposer;
use App\View\Composers\SettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('admin.layouts.partials.sidebar',MenuComposer::class);
        View::composer('admin.settings.index', SettingComposer::class);
    }
}
