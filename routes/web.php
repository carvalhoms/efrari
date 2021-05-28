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
        Route::resource('/admin/newsletter', 'NewsletterController');
        Route::resource('/admin/blog', 'BlogController');

        Route::post('/admin/uploadImgBlog', 'BlogController@uploadImg')->name('blog.uploadImg');
        Route::post('/admin/uploadFileBlog', 'BlogController@uploadFile')->name('blog.uploadFile');
    });

    Route::group(['namespace' => 'Catalog'], function () {
        Route::resource('/admin/montadoras', 'MontadoraController');
        Route::resource('/admin/veiculos', 'VeiculoController');
        Route::resource('/admin/linhas', 'LinhaController');
        Route::resource('/admin/descricao', 'DescricaoController');
        
        Route::resource('/admin/produtos', 'ProdutoController');

        Route::post('/admin/aplicacao', 'ProdutoController@createAplicacao')->name('aplicacao.create');
        Route::delete('/admin/aplicacao/{aplicacao}', 'ProdutoController@destroyAplicacao')->name('aplicacao.destroy');
        
        Route::post('/admin/referencia', 'ProdutoController@createReferencia')->name('referencia.create');
        Route::delete('/admin/referencia/{referencia}', 'ProdutoController@destroyReferencia')->name('referencia.destroy');

        Route::post('/admin/uploadImg', 'ProdutoController@uploadImg')->name('produto.uploadImg');
    });
    
});

Route::get('/', 'Site\SiteController@index')->name('site');
Route::get('/getRepre/{uf}', 'Site\SiteController@getRepre')->name('getRepre');
Route::post('/saveEmail', 'Admin\Site\NewsletterController@store')->name('saveEmail');

Route::get('/catalogo', 'Site\CatalogoController@index')->name('catalog.index');

Route::get('/blog', 'Site\blogController@index')->name('blogSite.index');

Auth::routes();
