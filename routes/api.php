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

Route::prefix('clientes')->group(function () {
    Route::get('', 'ClienteController@getTodosClientes')->name('retonar.clientes');
    Route::post('', 'ClienteController@criarCliente')->name('criar.clientes');
    Route::get('{codigo_cliente}', 'ClienteController@getCliente')->name('retonar.cliente');
    Route::put('{codigo_cliente}', 'ClienteController@editarCliente')->name('editar.clientes');
    Route::delete('{codigo_cliente}', 'ClienteController@deletarCliente')->name('deletar.clientes');
});

Route::prefix('pedidos')->group(function () {
    Route::get('', 'PedidoController@getTodosPedidos')->name('retonar.pedidos');
    Route::post('', 'PedidoController@criarPedido')->name('criar.pedidos');
    Route::get('{codigo_pedido}', 'PedidoController@getPedido')->name('retonar.pedido');
    Route::put('{codigo_pedido}', 'PedidoController@editarPedido')->name('editar.pedidos');
    Route::delete('{codigo_pedido}', 'PedidoController@deletarPedido')->name('deletar.pedidos');
});

Route::prefix('produtos')->group(function () {
    Route::get('', 'ProdutoController@getTodosProdutos')->name('retonar.produtos');
    Route::post('', 'ProdutoController@criarProduto')->name('criar.produtos');
    Route::get('{codigo_produto}', 'ProdutoController@getProduto')->name('retonar.produto');
    Route::put('{codigo_produto}', 'ProdutoController@editarProduto')->name('editar.produtos');
    Route::delete('{codigo_produto}', 'ProdutoController@deletarProduto')->name('deletar.produtos');
});
