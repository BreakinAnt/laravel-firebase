<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BackController;

Route::get('/users', [BackController::class, 'getUsers']);
Route::get('/users/{id}', [BackController::class, 'getUser']);
Route::post('/users', [BackController::class, 'postUser']);
Route::put('/users/{id}', [BackController::class, 'putUser']);
Route::delete('/users/{id}', [BackController::class, 'deleteUser']);
