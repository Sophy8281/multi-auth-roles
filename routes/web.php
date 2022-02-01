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
    if(Auth::check() && Auth::user()->role_id == 1){
        return redirect('admin/dashboard');
    } elseif(Auth::check() && Auth::user()->role_id == 2){
        return redirect('user/dashboard');
    }  else{
        return redirect('login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as'=>'admin.','prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
});

Route::group(['as'=>'user.','prefix' => 'user','middleware'=>['auth','user']], function () {
    Route::get('dashboard', 'App\Http\Controllers\User\DashboardController@index')->name('user.dashboard');
});
