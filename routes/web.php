<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RatingController;

Route::get('/landing', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/artikel', [ArticleController::class, 'showArticles'])->name('artikel');

Route::get('/detail-artikel/{id}', [ArticleController::class, 'showDetailArticles'])->name('detail-artikel');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/dashboard', [ArticleController::class, 'store'])->name('article.store');

    Route::get('/dashboard/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/dashboard/update/{id}', [ArticleController::class, 'update'])->name('article.update');

    Route::delete('/dashboard/delete/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');

});

Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');





