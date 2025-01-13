<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);
Route::get('/blog/{slug}', [PostsController::class, 'show'])->name('blog.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/blog/{slug}/edit', [PostsController::class, 'edit'])->name('blog.edit');
});




require __DIR__.'/auth.php';