<?php

namespace App\Providers;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

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
         view()->composer(['employee.*', 'course.*', 'anouncement.*' , '*'], function ($view) {
            
            $user = null;
            if (Auth::guest()){

                //dd('h');
                $view->with('user', null);
            }
            
            else{
           $user = User::Find(Auth::user()->id);
           //dd( $user);
 
 
           
             if ($user) {
                 $view->with('user', $user);
             } else {
                 $view->with('user', null);
             }

            }
 
         });
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
