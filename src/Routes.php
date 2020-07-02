 <?php

use Illuminate\Support\Facades\Route;
use Ramin\Cart\Storage\Contracts\StorageInterface;

Route::namespace('Ramin\Cart\Controller')->group(function(){
    Route::get( 'basket/add/{product}' ,  'BasketController@add')->name('basket.add');
});


Route::get('basket/clear',function(){
    resolve(StorageInterface::class)->clear();
});

