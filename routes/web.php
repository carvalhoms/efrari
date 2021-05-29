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
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::resource('/user', 'UserController');
    });

    Route::group(['prefix' => 'admin', 'namespace' => 'Site'], function () {
        Route::resource('/representantes', 'RepreController');
        Route::resource('/newsletter', 'NewsletterController');
        Route::resource('/blog', 'BlogController');

        Route::post('/uploadImgBlog', 'BlogController@uploadImg')->name('blog.uploadImg');
        Route::post('/uploadFileBlog', 'BlogController@uploadFile')->name('blog.uploadFile');
    });

    Route::group(['prefix' => 'admin', 'namespace' => 'Catalog'], function () {
        Route::resource('/montadoras', 'MontadoraController');
        Route::resource('/veiculos', 'VeiculoController');
        Route::resource('/linhas', 'LinhaController');
        Route::resource('/descricao', 'DescricaoController');
        Route::resource('/produtos', 'ProdutoController');

        Route::group(['prefix' => 'aplicacao'], function () {
            Route::post('/', 'ProdutoController@createAplicacao')->name('aplicacao.create');
            Route::delete('/{aplicacao}', 'ProdutoController@destroyAplicacao')->name('aplicacao.destroy');
        });

        Route::group(['prefix' => 'referencia'], function () {
            Route::post('/', 'ProdutoController@createReferencia')->name('referencia.create');
            Route::delete('/{referencia}', 'ProdutoController@destroyReferencia')->name('referencia.destroy');
        });
        
        Route::post('/uploadImg', 'ProdutoController@uploadImg')->name('produto.uploadImg');
    });
    
});

Route::get('/', 'Site\SiteController@index')->name('site');
Route::get('/getRepre/{uf}', 'Site\SiteController@getRepre')->name('getRepre');
Route::post('/saveEmail', 'Admin\Site\NewsletterController@store')->name('saveEmail');

Route::get('/catalogo', 'Site\CatalogoController@index')->name('catalog.index');

Route::get('/blog', 'Site\blogController@index')->name('blogSite.index');

Auth::routes();
