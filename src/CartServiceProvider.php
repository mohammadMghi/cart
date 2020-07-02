<?php

namespace Ramin\Cart;

use Illuminate\Support\ServiceProvider;
use Ramin\Cart\Storage\Contracts\StorageInterface;
use Ramin\Cart\Storage\SessionStorage;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
       // $this->loadViewsFrom(__DIR__.'/views', 'todolist');
       /* $this->publishes([
            __DIR__.'/views' => base_path('resources/views/ramin/mypackage'),
        ]);*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       /* you can change your storage to any storage think you needed
         if you wanna do that just create your storage in Storage folder and change the SessionStorage to your type of storage
        */
       $this->app->bind(StorageInterface::class ,function($app){
            return new SessionStorage('cart');
       } );
    
    }
}