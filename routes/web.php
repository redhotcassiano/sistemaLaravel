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

Route::get('/', function () {
    return view('home');
});

//Rotas para a API do sistema de produtos;
Route::group(['prefix' => 'api'], function(){
	//Tours
	Route::get('produtos', 'Produtos\ProdutosController@index');
	Route::get('produtos/{id}', 'Produtos\ProdutosController@show');
	Route::post('produtos', 'Produtos\ProdutosController@create');
	Route::put('produtos/{id}', 'Produtos\ProdutosController@update');
	Route::delete('produtos/{id}', 'Produtos\ProdutosController@destroy');

});
