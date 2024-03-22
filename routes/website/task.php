<?php 

Route::prefix('tasks')->controller(\App\Http\Controllers\TaskController::class)->group(function() {
    Route::get('/', 'index');
    Route::get('/{task}/show', 'show');
});