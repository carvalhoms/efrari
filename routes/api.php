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


Route::get('catalogo/getmontadora/{linha}', 'Site\catalogoController@getMontadoras')->name('get.montadora');
Route::get('catalogo/getveiculo/{mont}', 'Site\catalogoController@getVeiculos')->name('get.veiculo');

Route::get('/catalogo/code/search/{code}', 'Site\CatalogoController@getProductCode')->name('get.productCode');
Route::get('/catalogo/aplic/search/{desc}/{mont}/{veic?}', 'Site\catalogoController@getProductAplic')->name('get.productAplic');