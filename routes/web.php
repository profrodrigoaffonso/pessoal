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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('login.login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', function(){
        return view('admin');
    })->name('login.admin');

    Route::prefix('fotos')->group(function(){
        Route::get('/', 'App\Http\Controllers\FotosController@index')->name('fotos.index');
        Route::get('create', 'App\Http\Controllers\FotosController@create')->name('fotos.create');
        Route::post('store', 'App\Http\Controllers\FotosController@store')->name('fotos.store');
        Route::delete('delete', 'App\Http\Controllers\FotosController@delete')->name('fotos.delete');
    });

    Route::prefix('remedios')->group(function(){
        Route::get('/', 'App\Http\Controllers\RemediosController@index')->name('remedios.index');
        Route::get('/create', 'App\Http\Controllers\RemediosController@create')->name('remedios.create');
        Route::post('/store', 'App\Http\Controllers\RemediosController@store')->name('remedios.store');
        Route::get('/{id}/edit', 'App\Http\Controllers\RemediosController@edit')->name('remedios.edit');
        Route::put('/update', 'App\Http\Controllers\RemediosController@update')->name('remedios.update');
        Route::get('/horarios', 'App\Http\Controllers\RemediosController@horarios')->name('remedios.horarios');
        Route::post('/horarios-store', 'App\Http\Controllers\RemediosController@horariosStore')->name('remedios.horarios.store');
        Route::delete('/delete-horarios', 'App\Http\Controllers\RemediosController@horariosDelete')->name('remedios.horarios.delete');
    });
});