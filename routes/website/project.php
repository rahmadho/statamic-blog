<?php 

Route::prefix('projects')->controller(\App\Http\Controllers\ProjectController::class)->group(function() {
    Route::get('/', 'index');
    Route::post('/store', 'store');
    Route::get('/{project}/show', 'show');
})->withoutMiddleware(['csrf', 'web']);