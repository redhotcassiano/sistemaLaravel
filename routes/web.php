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
Route::group(['prefix' => 'v1'], function(){
	//Tours
	Route::get('produtos', 'ProdutosController@index');
	Route::get('produtos/{id}', 'ProdutosController@show');
	Route::post('produtos', 'ProdutosController@create');
	Route::put('produtos/{id}', 'ProdutosController@update');
	Route::delete('produtos/{id}', 'ProdutosController@destroy');
  
});
