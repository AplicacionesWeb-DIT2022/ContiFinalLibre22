<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\LugaresController;
use App\Http\Controllers\Api\ClientesController;

Route::get('/producto', [ProductosController::class, 'index']);

Route::get('/cliente', [ClientesController::class, 'index']);

Route::get('/lugare', [LugaresController::class, 'index']);