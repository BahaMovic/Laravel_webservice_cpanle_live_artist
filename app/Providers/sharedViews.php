<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use App\User;
class sharedViews extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      $users = User::where('type_id','>',1)->get();
      View::share('users',$users);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
