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

Route::get('/main-ajax', 'MainAjaxController@index');

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

Route::post('/init-product-reviews', 'ProductController@initReviewsView');


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
Route::get('/confirm-new-email/{confirmationToken}/{language?}', 'Profile\PersonalInfoController@confirmNewEmail')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);


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

Route::post('/create-order', 'OrderController@createOrder');

Route::group(['prefix' => 'profile'], function ()
{
    Route::get('/personal-info/{language?}', 'Profile\PersonalInfoController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::get('/change-password/{language?}', 'Profile\ChangePasswordController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::get('/my-orders/{language?}', 'Profile\MyOrdersController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/my-orders/{page}/{language?}', 'Profile\MyOrdersController@index')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::get('/wish-list/{language?}', 'Profile\WishlistController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    Route::get('/wish-list/{page}/{language?}', 'Profile\WishlistController@index')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
    
    Route::post('/save-personal-info', 'Profile\PersonalInfoController@savePersonalInfo');

    Route::post('/change-password', 'Profile\ChangePasswordController@changePassword');
    
    Route::post('/delete-wish-list-product', 'Profile\WishlistController@deleteFromWishList');
    
    Route::post('/add-to-wish-list-product', 'Profile\WishlistController@addWishListProduct');
    
    Route::post('/init-wish-list', 'Profile\WishlistController@initWishList');
    
    Route::post('/init-wish-list-view', 'Profile\WishlistController@initWishListView');
});

Route::post('/add-review', 'ReviewController@addReview');

Route::post('/order-call', 'CallController@orderCall');

//Route::get('change-password', 'HomeController@showChangePasswordForm');
//Route::post('change-password', 'HomeController@changePassword');


//Auth::routes();