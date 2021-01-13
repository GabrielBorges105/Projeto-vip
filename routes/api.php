<?php

use App\Http\Controllers\api\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('clientes',  ClienteController::class);
