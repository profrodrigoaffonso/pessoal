<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RemediosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/receber', 'App\Http\Controllers\ComandosController@receber')->name('comandos.receber');
Route::get('/enviar_comando', 'App\Http\Controllers\ComandosController@enviarComando')->name('comandos.enviar');
Route::post('/alterar_comando', 'App\Http\Controllers\ComandosController@alterarComando')->name('comandos.executar');

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
        Route::get('/', [RemediosController::class, 'index'])->name('remedios.index');
        Route::get('/create', [RemediosController::class, 'create'])->name('remedios.create');
        Route::post('/store', [RemediosController::class, 'store'])->name('remedios.store');
        Route::get('/{id}/edit', [RemediosController::class, 'edit'])->name('remedios.edit');
        Route::put('/update', [RemediosController::class, 'update'])->name('remedios.update');
        Route::get('/horarios', [RemediosController::class, 'horarios'])->name('remedios.horarios');
        Route::post('/horarios-store', [RemediosController::class, 'horariosStore'])->name('remedios.horarios.store');
        Route::delete('/delete-horarios', [RemediosController::class, 'horariosDelete'])->name('remedios.horarios.delete');
    });
});
