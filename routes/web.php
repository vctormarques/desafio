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


Route::get('/', function () {
    return view('index');
}); 

Route::get('/abrir-venda', 'VendasController@abrirVenda');

Route::post('/nova-venda/item', 'VendasController@store');
Route::post('/nova-venda/concluir', 'VendasController@update');
Route::get('/nova-venda', 'VendasController@novaVenda');
Route::post('/nova-venda', 'VendasController@novaVenda')->name('nova-venda');

Route::get('/vendas', 'VendasController@index');
Route::post('/vendas', 'VendasController@create')->name('cadastrar-venda');

Route::get('/produtos', 'ProdutosController@index');
Route::post('/produtos', 'ProdutosController@store');

Route::get('/categorias', 'CategoriasController@index');
Route::post('/categorias', 'CategoriasController@store');
