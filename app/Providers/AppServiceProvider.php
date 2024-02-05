<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view)
    {
        if (Auth::check()) {
            $view->with('currentUser', Auth::user());
            $user = Auth::user();
            $employees = User::orderBy('id', 'desc')->where('org_id', $user->id)->where('user_type', 'employer')->get();
            $view->with('employees', $employees);

        }else {
            $view->with('employees', null);
        }
    });
    }
}
