<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iShipping\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole())
        {
            if (ishipping('database.migrations.include', true)) $this->loadMigrationsFrom(ishipping_path('database/migrations'));
        }
        $this->mergeConfigFrom(ishipping_path('config/ishipping.php'), 'ilaravel.main.ishipping');
    }

    public function register()
    {
        parent::register();
    }
}
