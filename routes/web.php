<?php

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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function(){
    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::group(['namespace' => 'Site'], function () {
        Route::resource('/admin/representantes', 'RepreController');
    
    });

    Route::group(['namespace' => 'Catalog'], function () {
        Route::resource('/admin/montadoras', 'MontadoraController');
        Route::resource('/admin/veiculos', 'VeiculoController');
        Route::resource('/admin/linhas', 'LinhaController');
        Route::resource('/admin/descricao', 'DescricaoController');
        
        Route::resource('/admin/produtos', 'ProdutoController');

        Route::post('/admin/aplicacao', 'produtoController@createAplicacao')->name('aplicacao.create');
        Route::delete('/admin/aplicacao/{aplicacao}', 'produtoController@destroyAplicacao')->name('aplicacao.destroy');
        
        Route::post('/admin/referencia', 'produtoController@createReferencia')->name('referencia.create');
        Route::delete('/admin/referencia/{referencia}', 'produtoController@destroyReferencia')->name('referencia.destroy');
    });
    
});

Route::get('/', 'Site\SiteController@index')->name('site');

Route::get('/catalogo', function () {
    return view('/catalog.index');
});

Auth::routes();


