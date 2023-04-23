<?php
use Illuminate\Support\Facades\Route;

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
        Route::prefix('locales')->name('locales/')->group(static function() {
            Route::get('/',                                             'LocalesController@index')->name('index');
            Route::get('/create',                                       'LocalesController@create')->name('create');
            Route::post('/',                                            'LocalesController@store')->name('store');
            Route::get('/{locale}/edit',                                'LocalesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LocalesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{locale}',                                    'LocalesController@update')->name('update');
            Route::delete('/{locale}',                                  'LocalesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('lugares')->name('lugares/')->group(static function() {
            Route::get('/',                                             'LugaresController@index')->name('index');
            Route::get('/create',                                       'LugaresController@create')->name('create');
            Route::post('/',                                            'LugaresController@store')->name('store');
            Route::get('/{lugare}/edit',                                'LugaresController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LugaresController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lugare}',                                    'LugaresController@update')->name('update');
            Route::delete('/{lugare}',                                  'LugaresController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductoController@index')->name('index');
            Route::get('/create',                                       'ProductoController@create')->name('create');
            Route::post('/',                                            'ProductoController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductoController@update')->name('update');
            Route::delete('/{producto}',                                'ProductoController@destroy')->name('destroy');
        });
    });
});