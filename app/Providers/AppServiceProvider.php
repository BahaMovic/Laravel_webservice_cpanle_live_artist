<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Message;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      $users = User::where('type_id','>',1)->get();
      for($i = 0 ; $i < sizeof($users) ; $i ++)
      {
        $data = Message::where('user_id','=',$users[$i]->id)->where('seen','=','0')->count();
        $users[$i]['countMessages'] = $data;
      }
      View::share('usersSuper',$users);
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
