<?php

return [
    App\Providers\AuthServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\ComposerServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    OwenIt\Auditing\AuditingServiceProvider::class,
    Spatie\Permission\PermissionServiceProvider::class,
    Spatie\Html\HtmlServiceProvider::class,
    Biscolab\ReCaptcha\ReCaptchaServiceProvider::class,
    Barryvdh\Debugbar\ServiceProvider::class,
    Maatwebsite\Excel\ExcelServiceProvider::class,
    Laravel\Passport\PassportServiceProvider::class,
];
