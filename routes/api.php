<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth.basic', 'prefix' => 'pokemons'], function () {
    Route::get('/', 'PokemonController@index')->name('api.pokemons.index');
    Route::get('/{id}', 'PokemonController@show')->name('api.pokemons.show');

});
