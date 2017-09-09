<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
  //       \View::share('markets', \App\Market::all());
		// \View::share('packages', \App\Package::all());
		// Schema::defaultStringLength(191);

  //       \Cloudinary::config(array( 
  //         "cloud_name" => "crypto2naira", 
  //         "api_key" => "328753983467173", 
  //         "api_secret" => "hzqND4v2tKPkXs-r8mB-siWQ6lA" 
  //       ));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}