<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('landing',[AdminController::class,'landing']);
Route::get('show-landing/{id}',[AdminController::class,'showLanding']);
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

//user
Route::get('landing-user/{title}', [UserController::class, 'landingUser'])->name('landing.user')->where('title', '[a-zA-Z0-9\-]+');
Route::get('show-article-user/{id}',[UserController::class,'showArticleUser'])->name('show.article.user');

//admin
Route::middleware(['isGuest'])->group( function(){
    Route::get('login',[AdminController::class,'login'])->name('login');
    Route::post('login/auth',[AdminController::class,'loginAuth'])->name('login.auth');
});

Route::middleware(['isLogin'])->group( function(){
    Route::get('dashboard',[AdminController::class,'dashboard']);

    Route::get('article',[ArticleController::class,'article']);
    Route::get('create-article',[ArticleController::class,'createArticle'])->name('create-article');
    Route::post('create-article-post',[ArticleController::class,'createArticlePost'])->name('create-article.post');
    Route::get('show-article/{id}',[ArticleController::class,'showArticle']);
    Route::get('edit/{id}',[ArticleController::class,'edit'])->name('edit-article');
    Route::post('update/{id}',[ArticleController::class,'update'])->name('edit-article.put');
    Route::get('delete-article/{id}',[ArticleController::class,'destroyArticle'])->name('delete-article');

    Route::get('category',[CategoryController::class,'category']);
    Route::post('create-category-post',[CategoryController::class,'createCategoryPost'])->name('create-category.post');
    Route::get('delete-category/{id}',[CategoryController::class,'destroyCategory'])->name('delete-category');

    Route::get('title',[MainController::class,'main']);
    Route::post('create-main-post',[MainController::class,'createMainPost'])->name('create-main.post');
    Route::get('delete-main/{id}',[MainController::class,'destroyMain'])->name('delete-main');
});
