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
    return view('home');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function() {
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::view('/login','admin.login')->name('admin.login');

        Route::post('/login',
            [App\Http\Controllers\Admin\AdminController::class, 'authenticate']
        )->name('admin.auth');
    });
    
    Route::group(['middleware' => 'admin.auth'], function(){
        Route::get('/', function(){
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard',
            [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']
        )->name('admin.dashboard');

        Route::post('/logout', 
            [App\Http\Controllers\Admin\AdminController::class, 'logout']
        )->name('admin.logout');

        
        Route::get('/my-profile',
            [App\Http\Controllers\Admin\AdminController::class, 'my_profile']
        )->name('admin.my_profile');

        Route::post('/my-profile',
            [App\Http\Controllers\Admin\AdminController::class, 'update_profile']
        )->name('admin.update_profile');

        Route::view('/change-password', 'admin.change-password')->name('admin.change_password');

        Route::post('/change-password-submit', 
            [App\Http\Controllers\Admin\AdminController::class, 'change_password']
        )->name('admin.change_password_submit');

        Route::get('/logout', function(){
            return redirect()->route('admin.login');
        });


        Route::get('/user/list', 
            [App\Http\Controllers\Admin\UserDataController::class, 'index']
        )->name('admin.user_list');

        Route::get('/user/list-data', 
            [App\Http\Controllers\Admin\UserDataController::class, 'userTableData']
        )->name('admin.user_table_data');
    });
});