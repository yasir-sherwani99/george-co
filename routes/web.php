<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
|
| The guests routes
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('about', [App\Http\Controllers\PageController::class, 'aboutIndex'])->name('about');
Route::get('projects', [App\Http\Controllers\PageController::class, 'projectsIndex'])->name('projects');
Route::get('services', [App\Http\Controllers\PageController::class, 'servicesIndex'])->name('services');
Route::get('contact-us', [App\Http\Controllers\PageController::class, 'contactIndex'])->name('contact');

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
|
| The users routes
|
*/
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
});

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
| The admins routes
|
*/
Route::group([
    'prefix' => 'admin'
], function() {
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm']);
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.store');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout'); 
    Route::middleware('auth-admin')->group(function() {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'getDashboard'])->name('admin.dashboard');
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::get('projects', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects.index');
        Route::get('projects/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create');
        Route::post('projects', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
        Route::get('projects/{project}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('projects/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
        Route::delete('projects/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
        Route::get('metatags', [App\Http\Controllers\Admin\MetaTagController::class, 'index'])->name('metatags.index');
        Route::get('metatags/{metatag}/edit', [App\Http\Controllers\Admin\MetaTagController::class, 'edit'])->name('metatags.edit');
        Route::put('metatags/{metatag}', [App\Http\Controllers\Admin\MetaTagController::class, 'update'])->name('metatags.update');
        Route::resource('admins', App\Http\Controllers\Admin\AdminController::class);
    });
});


