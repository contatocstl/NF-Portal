<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotaController;

Route::post('/notas', [NotaController::class, 'receber']);