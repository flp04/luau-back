<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DefinicoesInputController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::get('getDefinicoesInput', [DefinicoesInputController::class, 'getDefinicoesInput']);

Route::post('cadastrarProduto', [ProdutoController::class, 'cadastrarProduto']);
Route::get('produtos', [ProdutoController::class, 'pegarProdutos']);
Route::get('produto/{id}', [ProdutoController::class, 'pegarProduto']);
Route::post('atualizar-produto/{id}', [ProdutoController::class, 'atualizarProduto']);

Route::post('cadastrarFornecedor', [FornecedorController::class, 'cadastrarFornecedor']);
Route::get('fornecedores', [FornecedorController::class, 'pegarFornecedores']);
Route::get('fornecedor/{id}', [FornecedorController::class, 'pegarFornecedor']);

Route::post('cadastrarCompra', [CompraController::class, 'cadastrarCompra']);
Route::get('compras', [CompraController::class, 'pegarCompras']);
Route::get('compra/{id}', [CompraController::class, 'pegarCompra']);

Route::post('cadastrarCliente', [ClienteController::class, 'cadastrarCliente']);
Route::get('clientes', [ClienteController::class, 'pegarClientes']);
Route::get('cliente/{id}', [ClienteController::class, 'pegarCliente']);

Route::get('crediarios', [VendaController::class, 'pegarCrediarios']);
Route::post('cadastrarVenda', [VendaController::class, 'cadastrarVenda']);
Route::get('vendas', [VendaController::class, 'pegarVendas']);
Route::get('venda/{id}', [VendaController::class, 'pegarVenda']);
Route::post('inserirPagamento', [VendaController::class, 'inserirPagamento']);

// Route::get('getProdutos', [ProdutoController::class, 'pegarProdutos']);
// Route::get('users', [Controller::class, 'getUsers']);
Route::middleware('auth:api')->get('users', [Controller::class, 'getUsers']);
// Route::middleware('auth:api')->get('getDefinicoesInput', [DefinicoesInputController::class, 'getDefinicoesInput']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
