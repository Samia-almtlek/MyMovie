<?php


use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'index'])->name('index');

Route::resource('/blog', PostsController::class);
Route::get('/blog/{slug}', [PostsController::class, 'show'])->name('blog.show');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/dashboard', function () {
    return redirect('/'); // إعادة التوجيه للصفحة الرئيسية
})->name('dashboard');

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

Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel')->middleware('auth');

Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users')->middleware('auth');
Route::patch('/admin/users/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.users.makeAdmin')->middleware('auth');
Route::patch('/admin/users/{id}/revoke-admin', [AdminController::class, 'revokeAdmin'])->name('admin.users.revokeAdmin')->middleware('auth');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::patch('/admin/users/{id}/make-admin', [AdminController::class, 'makeAdmin'])->name('admin.users.makeAdmin');
    Route::patch('/admin/users/{id}/revoke-admin', [AdminController::class, 'revokeAdmin'])->name('admin.users.revokeAdmin');
    Route::get('/admin/panel', [AdminController::class, 'index'])->name('admin.panel');
});

Route::get('/faqs', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faqs', [FaqController::class, 'store'])->middleware('auth')->name('faq.store');

Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth')->name('categories.store');

Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->middleware('auth', 'is_admin')->name('faq.edit');
Route::put('/faqs/{faq}', [FaqController::class, 'update'])->middleware('auth', 'is_admin')->name('faq.update');
Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->middleware('auth', 'is_admin')->name('faq.destroy');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


require __DIR__.'/auth.php';