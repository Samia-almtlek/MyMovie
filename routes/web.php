<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PagesController::class, 'index'])->name('index');

// About Page
Route::get('/about', fn() => view('about'))->name('about');

// Dashboard redirection (redirect to homepage)
Route::get('/dashboard', fn() => redirect('/'))->name('dashboard');

// Blog routes
Route::resource('/blog', PostsController::class);
Route::get('/blog/{slug}', [PostsController::class, 'show'])->name('blog.show');

// Routes for authenticated users only
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // FAQ and categories management
    Route::post('/faqs', [FaqController::class, 'store'])->name('faq.store');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
});
// Allow anyone to view user profiles
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Routes for admin users only
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin panel
    Route::get('/panel', [AdminController::class, 'index'])->name('panel');

    // User management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminController::class, 'manageUsers'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::patch('/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('makeAdmin');
        Route::patch('/{id}/revoke-admin', [AdminController::class, 'revokeAdmin'])->name('revokeAdmin');
    });

    // FAQ management
    Route::prefix('faqs')->name('faq.')->group(function () {
        Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('edit');
        Route::put('/{faq}', [FaqController::class, 'update'])->name('update');
        Route::delete('/{faq}', [FaqController::class, 'destroy'])->name('destroy');
    });

    // Blog creation and editing
    Route::get('/blog/create', [PostsController::class, 'create'])->name('blog.create');
    Route::get('/blog/{slug}/edit', [PostsController::class, 'edit'])->name('blog.edit');
});

// Public FAQ view
Route::get('/faqs', [FaqController::class, 'index'])->name('faq.index');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

// Authentication routes
require __DIR__.'/auth.php';