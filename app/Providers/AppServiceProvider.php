<?php

namespace App\Providers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        View()->composer(['index','item-details'], function(View $view){
            $view->with('recoProducts', $recoProducts = Product::where('remise','>','10')->orderBy('id','desc')->take(4)->get());
        });
        schema::defaultStringLength(191);
        Paginator::useBootstrap();
        

        View()->composer(['index','wishlist','categories','details-item','inc.master-navbar','inc.master'], function($view){
            if(Auth::id())
            {
            $data = Product::All();
            $user = auth()->user();
            $count = cart::where('name', $user->name)->count();
            $view->with([ 'data' => $data,
                            'count' => $count  ]);
        }});
        

        
    }
}
