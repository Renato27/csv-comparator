<?php

use App\Http\Controllers\CsvController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CsvController::class, 'index']);
Route::post('/compare', [CsvController::class, 'compare']);
