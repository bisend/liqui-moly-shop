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
 * Home index page
 * route: /{language?}
 */
Route::get('/{language?}', 'HomeController@index')
    ->where('language', '^(uk|ru)?$')
    ->name('home');


/**
 * Ajax method handler
 */
Route::get('/main-ajax', 'MainAjaxController@index');

/**
 * Category page
 */
Route::group(['prefix' => 'category'], function ()
{
    /**
     * Category page
     */
    Route::get('/{slug}/{language?}', 'CategoryController@index')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Category page pagination
     */
    Route::get('/{slug}/{page}/{language?}', 'CategoryController@indexPagination')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Category page sorted
     */
    Route::get('/{slug}/{sort}/{language?}', 'CategoryController@indexSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Category page sorted pagination
     */
    Route::get('/{slug}/{sort}/{page}/{language?}', 'CategoryController@indexPaginationSort')
        ->where([
            'slug' => '^[a-z0-9-]+$',
            'sort' => '^(price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);
});

/**
 * Product page
 */
Route::get('/product/{slug}/{language?}', 'ProductController@index')
    ->where([
        'slug' => '^[a-z0-9-]+$',
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Product reviews init method
 */
Route::post('/init-product-reviews', 'ProductController@initReviewsView');

/**
 * Errors handler
 */
Route::group(['prefix' => 'errors'], function ()
{
    /**
     * Error page
     */
    Route::get('/{error}/{language?}', 'ErrorController@index')
        ->where([
            'error' => '^(400|401|403|404|500)$',
            'language' => '^(uk|ru)?$'
        ]);
});

/**
 * Search group
 */
Route::group(['prefix' => 'search'], function ()
{
    /**
     * Search results page
     */
    Route::get('/{series}/{language?}', 'SearchController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page sorted
     */
    Route::get('/{series}/{sort}/{language?}', 'SearchController@indexSort')
        ->where([
            'sort' => '^(price-asc|price-desc)$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page pagination
     */
    Route::get('/{series}/{page}/{language?}', 'SearchController@indexPagination')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Search results page sorted pagination
     */
    Route::get('/{series}/{sort}/{page}/{language?}', 'SearchController@indexPaginationSort')
        ->where([
            'sort' => '^(price-asc|price-desc)$',
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Ajax search results handler
     */
    Route::get('/async/{series}/{language?}', 'SearchController@indexAsync')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);
});

/**
 * Login post method handler
 */
Route::post('/login', 'User\LoginController@login');

/**
 * Logout post method handler
 */
Route::post('/logout', 'User\LoginController@logout');

/**
 * Register post method handler
 */
Route::post('/register', 'User\RegisterController@register');

/**
 * Confirmation token after register method handler
 */
Route::get('/confirm/{confirmationToken}/{language?}', 'User\ConfirmationEmailController@confirm')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Restore password method handler
 */
Route::post('/restore-password', 'User\RestorePasswordController@restore');

/**
 * Confirmation new email method handler
 */
Route::get('/confirm-new-email/{confirmationToken}/{language?}', 'Profile\PersonalInfoController@confirmNewEmail')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Cart group
 */
Route::group(['prefix' => 'cart'], function ()
{
    /**
     * Init cart on page load
     */
    Route::get('/init-cart/{language?}', 'CartController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * add
     */
    Route::post('/add-to-cart', 'CartController@addToCart');

    /**
     * delete
     */
    Route::post('/delete-from-cart', 'CartController@deleteFromCart');

    /**
     * update
     */
    Route::post('/update-cart', 'CartController@updateCart');

    /**
     * clear cart
     */
    Route::post('/clear-cart', 'CartController@clearCart');
});

/**
 * Order page
 */
Route::get('/order/{language?}', 'OrderController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Save new order
 */
Route::post('/create-order', 'OrderController@createOrder');

/**
 * Profile group
 */
Route::group(['prefix' => 'profile'], function ()
{
    /**
     * Personal info page
     */
    Route::get('/personal-info/{language?}', 'Profile\PersonalInfoController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * Change password page
     */
    Route::get('/change-password/{language?}', 'Profile\ChangePasswordController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * My orders page
     */
    Route::get('/my-orders/{language?}', 'Profile\MyOrdersController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * My orders page pagination
     */
    Route::get('/my-orders/{page}/{language?}', 'Profile\MyOrdersController@index')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * WishList page
     */
    Route::get('/wish-list/{language?}', 'Profile\WishlistController@index')
        ->where([
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * WishList page pagination
     */
    Route::get('/wish-list/{page}/{language?}', 'Profile\WishlistController@index')
        ->where([
            'page' => '^[2-9]{1}|[1-9]{1}[0-9]+$',
            'language' => '^(uk|ru)?$'
        ]);

    /**
     * save personal data handler
     */
    Route::post('/save-personal-info', 'Profile\PersonalInfoController@savePersonalInfo');

    /**
     * change password handler
     */
    Route::post('/change-password', 'Profile\ChangePasswordController@changePassword');

    /**
     * delete product from wish-list handler
     */
    Route::post('/delete-wish-list-product', 'Profile\WishlistController@deleteFromWishList');

    /**
     * add product to wish-list handler
     */
    Route::post('/add-to-wish-list-product', 'Profile\WishlistController@addWishListProduct');

    /**
     * init wish list
     */
    Route::post('/init-wish-list', 'Profile\WishlistController@initWishList');

    /**
     * init WL
     */
    Route::post('/init-wish-list-view', 'Profile\WishlistController@initWishListView');
});

/**
 * add new review handler
 */
Route::post('/add-review', 'ReviewController@addReview');

/**
 * order a call handler
 */
Route::post('/order-call', 'CallController@orderCall');

/**
 * buy product in one click (fast order) handler
 */
Route::post('/buy-one-click', 'BuyOneClickController@saveFastOrder');

/**
 * Delivery-Payments static page
 */
Route::get('/delivery-payments/{language?}', 'DeliveryPaymentsController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Guarantees static page
 */
Route::get('/guarantees/{language?}', 'GuaranteesController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * About static page
 */
Route::get('/about/{language?}', 'AboutController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Contact static page
 */
Route::get('/contact/{language?}', 'ContactController@index')
    ->where([
        'language' => '^(uk|ru)?$'
    ]);

/**
 * Contact send email handler
 */
Route::post('/contact', 'ContactController@sendContactEmail');




//Auth::routes();