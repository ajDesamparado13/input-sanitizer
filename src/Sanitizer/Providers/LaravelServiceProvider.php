<?php

namespace Freedom\Sanitizer\Providers;

use Illuminate\Support\ServiceProvider;
class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        \App::bind('sanitizer',function(){
            return new  \Freedom\Sanitizer\Impl\GenericSanitizer;
        });

    }
}


