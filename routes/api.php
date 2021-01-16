<?php

use Illuminate\Http\Request;

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

Route::get('/catalogo/code/search/{code}', 'Site\CatalogoController@getCode')->name('get.code');

Route::get('catalogo/getVeiculo/{mont}', 'Site\catalogoController@getVeiculos')->name('get.veiculo');

Route::get('catalogo/aplic/search/{desc}/{mont}/{aplic?}', 'Site\catalogoController@getAplic')->name('get.aplic');