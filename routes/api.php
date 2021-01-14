<?php

use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\ProdutoController;
use App\Http\Controllers\api\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::apiResource('clientes',  ClienteController::class);
Route::apiResource('produtos',  ProdutoController::class);
Route::apiResource('pedidos',  PedidoController::class);

