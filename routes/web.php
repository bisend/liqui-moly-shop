<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Home index
 * route: /{language?}
 */
Route::get('/{language?}', 'HomeController@index')
    ->where('language', '^(uk|ru)?$')
    ->name('home');

/**
 * Category page
 */
Route::group(['prefix' => 'category'], function ()
{
    Route::get('/{slug}/{language?}', 'CategoryController@index')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{page}/{language?}', 'CategoryController@indexPagination')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{slug}/{sort}/{language?}', 'CategoryController@indexSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::get('/{slug}/{sort}/{page}/{language?}', 'CategoryController@indexPaginationSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
});

Route::get('/product/{slug}/{language?}', 'ProductController@index')
    ->where([
        'slug' => '^[a-z0-9-]+$',
        'language' => '^(uk|ru)?$'
    ]);


Route::group(['prefix' => 'errors'], function ()
{
    Route::get('/{error}/{language?}', 'ErrorController@index')
        ->where([
            'error' => '^(404|403|400)$',
            'language' => '^(uk|ru)?$'
        ]);
});


Route::group(['prefix' => 'search'], function ()
{
    Route::get('/{series}/{language?}', 'SearchController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{series}/{sort}/{language?}', 'SearchController@indexSort')
        ->where([
            'sort' => '^(price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/{series}/{page}/{language?}', 'SearchController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::get('/{series}/{sort}/{page}/{language?}', 'SearchController@indexPaginationSort')
        ->where([
            'sort' => '^(price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/async/{series}/{language?}', 'SearchController@indexAsync')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);
});

Route::post('/login', 'User\LoginController@login');
Route::post('/logout', 'User\LoginController@logout');
Route::post('/register', 'User\RegisterController@register');
Route::get('/confirm/{confirmationToken}/{language?}', 'User\ConfirmationEmailController@confirm')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);
Route::post('/restore-password', 'User\RestorePasswordController@restore');



Route::group(['prefix' => 'cart'], function ()
{
    Route::get('/init-cart/{language?}', 'CartController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    Route::post('/add-to-cart', 'CartController@addToCart');
    
    Route::post('/delete-from-cart', 'CartController@deleteFromCart');
    
    Route::post('/update-cart', 'CartController@updateCart');

    Route::post('/clear-cart', 'CartController@clearCart');
});

Route::get('/order/{language?}', 'OrderController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

//Route::get('change-password', 'HomeController@showChangePasswordForm');
//Route::post('change-password', 'HomeController@changePassword');


//Auth::routes();