<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductosController@index')->name('index');
            Route::get('/create',                                       'ProductosController@create')->name('create');
            Route::post('/',                                            'ProductosController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductosController@update')->name('update');
            Route::delete('/{producto}',                                'ProductosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('puntos')->name('puntos/')->group(static function() {
            Route::get('/',                                             'PuntosController@index')->name('index');
            Route::get('/create',                                       'PuntosController@create')->name('create');
            Route::post('/',                                            'PuntosController@store')->name('store');
            Route::get('/{punto}/edit',                                 'PuntosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PuntosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{punto}',                                     'PuntosController@update')->name('update');
            Route::delete('/{punto}',                                   'PuntosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('puntos-venta')->name('puntos-venta/')->group(static function() {
            Route::get('/',                                             'PuntosVentaController@index')->name('index');
            Route::get('/create',                                       'PuntosVentaController@create')->name('create');
            Route::post('/',                                            'PuntosVentaController@store')->name('store');
            Route::get('/{puntosVentum}/edit',                          'PuntosVentaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PuntosVentaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{puntosVentum}',                              'PuntosVentaController@update')->name('update');
            Route::delete('/{puntosVentum}',                            'PuntosVentaController@destroy')->name('destroy');
        });
    });
});