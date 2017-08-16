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
    Route::get('/{params}/{language?}', 'SearchController@index');

});

//Route::get('login', 'HomeController@showLoginForm')->middleware('guest');
//Route::get('register', 'HomeController@showRegisterForm')->middleware('guest');

Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'HomeController@logout');
Route::get('change-password', 'HomeController@showChangePasswordForm');
Route::post('change-password', 'HomeController@changePassword');


//Auth::routes();