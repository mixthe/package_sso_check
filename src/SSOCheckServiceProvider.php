<?php

namespace Mixthe\sso_check;

use Illuminate\Support\ServiceProvider;

class SSOCheckServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('sso_check',function (){
            return new SSOCheck();
        });
    }

}