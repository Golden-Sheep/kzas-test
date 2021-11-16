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
Route::get('', function (){
    return redirect('/candidatos');
});

Route::get('login', 'AuthController@getViewLogin')->name('login');
Route::post('login', 'AuthController@postLogin');


Route::group(['middleware' => ['auth','userIsActive']], function() {
    Route::post('logout', 'AuthController@postLogout')->name('logout');

    Route::group(['middleware' => ['userIsAdmin']], function() {
        Route::get('usuarios', 'UsuarioController@index');
        Route::get('usuarios/cadastrar', 'UsuarioController@getViewCadastrar');
        Route::post('usuarios/cadastrar', 'UsuarioController@postCadastrar');
        Route::get('usuarios/bloquear/{id}', 'UsuarioController@getBloquear');
        Route::get('usuarios/desbloquear/{id}', 'UsuarioController@getDesbloquear');
    });

    Route::get('candidatos', 'CandidatoController@index');
    Route::get('candidatos/priorizados', 'CandidatoController@getViewCandidatosPriorizados');
    Route::get('candidatos/desconsiderados', 'CandidatoController@getViewCandidatosDesconsiderados');
    Route::get('candidatos/priorizar/{id}', 'CandidatoController@getPriorizarCandidato');
    Route::get('candidatos/desconsiderar/{id}', 'CandidatoController@getDesconsiderarCandidato');
});