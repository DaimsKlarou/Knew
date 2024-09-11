<?php

// use \App\Http\Controllers\Category\CategoryController;

use App\Http\Controllers\Articles\ArticleController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Author\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SocialMedia\SocialMediaController;
use App\Models\Article;
use App\Models\Category;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', function () {
    $categories = Category::all();
    $authors = User::where('role_id', 2)->paginate(10);
    return view('back.dashboard', compact('categories', 'authors'));
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //section of articles routes
    Route::resource('/article', ArticleController::class);

    Route::middleware('admin')->group(function () {
        //section of categories routes
        Route::resource('/category', CategoryController::class);

        //section of author routes
        Route::resource('/author', UserController::class);

        //section of SocialMedia
        Route::resource('/socialMedia', SocialMediaController::class);

        //section of settings routes
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings/store', [SettingsController::class, 'update'])->name('settings.store');
        Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

        //section of roles route
        Route::resource('/role', RoleController::class);
    });
});

require __DIR__ . '/auth.php';