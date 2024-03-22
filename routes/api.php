<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('projects')->controller(\App\Http\Controllers\ProjectController::class)->group(function() {
    Route::get('/', 'index');
    Route::post('/store', 'store');
    Route::patch('/{project}/update', 'update');
    Route::get('/{project}/show', 'show');
    Route::delete('/{project}/delete', 'delete');
});
