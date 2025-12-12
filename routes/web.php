<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AdminProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//// Projects
//Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
//Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
//Route::get('/projects/{project:slug}/download', [ProjectController::class, 'download'])->name('projects.download');
//
/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return redirect()->route('admin.projects.index');
    })->name('dashboard');

    // Projects CRUD
    Route::resource('projects', AdminProjectController::class);

});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze/Jetstream)
|--------------------------------------------------------------------------
| Uncomment if using Laravel Breeze or Jetstream
*/

// require __DIR__.'/auth.php';
