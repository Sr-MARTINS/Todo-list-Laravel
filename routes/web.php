<?php

use App\Http\Controllers\TodoItens;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoItens::class, 'index']);
Route::post('/create', [TodoItens::class, 'create']);
Route::get('/edit', [TodoItens::class, 'edit']);
Route::delete('/delete/{id}', [TodoItens::class, 'delete']);