<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ketika ingin me require seluruh file dengan extensi PHP di dalam direktori "website"
Route::prefix('website')->group(function() {
    $dirIterator = new RecursiveDirectoryIterator(__DIR__.'/website');
    $it = new RecursiveIteratorIterator($dirIterator);

    while ($it->valid()) {
        if (!$it->isDot() 
            && $it->isFile() 
            && $it->isReadable() 
            && $it->getExtension() === 'php') {
                require $it->current();
            }
        $it->next();
    }
});
