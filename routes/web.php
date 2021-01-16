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


Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){
    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', function() {
        if (Auth::user()->admin == 0) {
            return view('home');
        } else {
            return view('home');
        }
    });
});

//user=================================================================================
Route::post('/update-profile', 'UserController@update')->name('update-profile');
Route::get('/redirectUpdateProfile/{id}', 'UserController@updateProfile');

//product==================================================================================
Route::get('/product-list', 'ProductController@index')->name('product-list');

Route::get('/product-list/search', 'ProductController@searchProduct')->name('search');

//comment===========================================================================
Route::post('/insert-comment', 'ProductController@insertComment')->name('insert-comment');

//cart====================================================================
Route::get('/shopping-cart', 'CartController@indexCart')->name('shopping-cart');
Route::get('/product/{id}', 'CartController@indexAdd')->name('product');
Route::post('/add/{id}', 'CartController@addCart');

Route::post('/shopping-cart/{id}', 'CartController@checkout')->name('checkout');

Route::get('/delete-cart/{id}', 'CartController@removeCart')->name('remove-cart');

//transaction========================================================================
Route::get('/history-transaction', 'CartController@history')->name('history-transaction');
Route::post('/history-detail/{id}', 'CartController@detailTransaction')->name('transaction-detail');

//middleware================================================================
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    //user========================================================
    Route::get('/manage-member', 'UserController@getAll')->name('manage-member');

    Route::post('/insert-member', 'UserController@insert');
    Route::get('/insert-member', 'UserController@insertMember')->name('insert-member');

    Route::get('/delete-member/{id}', 'UserController@delete');

    Route::post('/update-user-profile', 'UserController@updateUser')->name('update-user-profile');
    Route::get('/redirectUpdateUserProfile/{id}', 'UserController@updateUserProfile');

    //transaction==================================================
    Route::get('/transaction-list', 'TransactionController@viewTransaction')->name('transaction-list');
    Route::post('/transaction-detail/{id}', 'TransactionController@detailTransactionAdmin')->name('transaction-detail-admin');

    //brand========================================================
    Route::post('/insert-brand', 'BrandController@insert')->name('insert-brand');
    Route::get('/insert-brand', 'BrandController@insertBrand');

    Route::get('/manage-brand', 'BrandController@getAll')->name('manage-brand');

    Route::get('/delete-brand/{id}', 'BrandController@delete');

    Route::post('/update-brand', 'BrandController@update')->name('update-brand');
    Route::get('/update-brand/{id}', 'BrandController@updateBrand');

    //product=======================================================
    Route::get('/insert-product', 'ProductController@insertProduct')->name('insert-product');
    Route::post('/insert-product', 'ProductController@insert');

    Route::get('/manage-product', 'ProductController@getAll')->name('manage-product');

    Route::post('/update-product', 'ProductController@update')->name('update-product');
    Route::get('/update-product/{id}', 'ProductController@updateProduct');

    Route::get('/delete-product/{id}', 'ProductController@delete');
});



//Route::get('/transaction-list', 'CartController@history');

//product----------------------------------------------------
//Route::get('/insert-product', 'ProductController@insertProduct')->name('insert-product');
//Route::post('/insert-product', 'ProductController@insert');
//
//Route::get('/manage-product', 'ProductController@getAll')->name('manage-product');
//
//Route::post('/update-product', 'ProductController@update')->name('update-product');
//Route::get('/update-product/{id}', 'ProductController@updateProduct');
//
//Route::get('/delete-product/{id}', 'ProductController@delete');
//------------------------------------------------------------

//admin==========================================================================
//Route::get('/manage-member', 'UserController@getAll')->name('manage-member');
//
//Route::post('/insert-member', 'UserController@insert');
//Route::get('/insert-member', 'UserController@insertMember')->name('insert-member');
//
//Route::get('/delete-member/{id}', 'UserController@delete');
//
//Route::post('/update-user-profile', 'UserController@updateUser')->name('update-user-profile');
//Route::get('/redirectUpdateUserProfile/{id}', 'UserController@updateUserProfile');
//
//Route::get('/transaction-list', 'TransactionController@viewTransaction')->name('transaction-list');
//Route::post('/transaction-detail/{id}', 'CartController@detailTransactionAdmin')->name('transaction-detail-admin');

//brand========================================================
//Route::post('/insert-brand', 'BrandController@insert')->name('insert-brand');
//Route::get('/insert-brand', 'BrandController@insertBrand');
//
//Route::get('/manage-brand', 'BrandController@getAll')->name('manage-brand');
//
//Route::get('/delete-brand/{id}', 'BrandController@delete');
//
//Route::post('/update-brand', 'BrandController@update')->name('update-brand');
//Route::get('/update-brand/{id}', 'BrandController@updateBrand');

