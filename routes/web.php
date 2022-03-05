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


Route::get('/', 'PokemonController@index')->name('pokemons.index');
Route::get('/pokemons/{id}', 'PokemonController@show')->name('pokemons.show');
Route::get('/pokemons/{id}/edit', 'PokemonController@edit')->name('pokemons.edit');
