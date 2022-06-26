<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ArticleTrashController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DraftController;
use App\Http\Controllers\Admin\DraftTrashController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\App\AboutController;
use App\Http\Controllers\App\ContactController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Blog\ArticleController;
use App\Http\Controllers\Blog\AuthorProfileController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::post('/', [HomeController::class, 'create']);
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');
Route::get('/category/{category}', [CategoryController::class, 'index'])
    ->name('category');
Route::get('/author/{author}', [AuthorProfileController::class, 'index'])
    ->name('author.profile');
Route::get('/tag/{tag}', [TagController::class, 'index'])
    ->name('tag');
Route::get('/article/{article}', [ArticleController::class, 'index'])
    ->name('article');
Route::post('/article/{article}', [CommentController::class, 'create'])
    ->name('comment.create');
Route::put('/article/{comment}', [CommentController::class, 'update'])
    ->name('comment.update');
Route::delete('/article/{comment}', [CommentController::class, 'reply'])
    ->name('comment.reply');

Route::prefix('/admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'index'])
            ->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login']);
    });
    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        Route::get('/articles', [AdminArticleController::class, 'index'])
            ->name('admin.articles');
        Route::get('/drafts', [DraftController::class, 'index'])
            ->name('admin.drafts');
        Route::get('/draft/{draft}', [DraftController::class, 'show'])
            ->name('admin.draft');
        Route::delete('/draft/{draft}', [DraftController::class, 'delete'])
            ->name('draft.delete');
        Route::post('/draft/{draft}', [DraftController::class, 'publish']);
        Route::get('/draft/{draft}/edit', [DraftController::class, 'show'])
            ->name('draft.edit');
        Route::get('/article/create', [ArticleController::class, 'show'])
            ->name('article.create');
        Route::post('/article/create', [ArticleController::class, 'create']);
        Route::get('/article/{article}/edit', [AdminArticleController::class, 'show'])
            ->name('article.edit');
        Route::delete('/article/{article}', [AdminArticleController::class, 'delete'])
            ->name('article.delete');
        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('admin.categories');
        Route::post('/categories', [AdminCategoryController::class, 'create']);
        Route::get('/category/{category}', [AdminCategoryController::class, 'show'])
            ->name('admin.category');
        Route::post('/category/{category}', [AdminCategoryController::class, 'update']);
        Route::get('/trash', [TrashController::class, 'index'])
            ->name('trash');
        Route::get('/trash/{article}/article', [ArticleTrashController::class, 'index'])
            ->name('trash.article');
        Route::post('/trash/{article}/article', [ArticleTrashController::class, 'restore']);
        Route::delete('/trash/{article}/article', [ArticleTrashController::class, 'delete']);
        Route::get('/trash/{draft}/draft', [DraftTrashController::class, 'index'])
            ->name('trash.draft');
        Route::post('/trash/{draft}/draft', [DraftTrashController::class, 'restore']);
        Route::delete('/trash/{draft}/draft', [DraftTrashController::class, 'delete']);
    });
    Route::delete('/', function () {
        auth()->logout();
        return redirect()->route('home');
    })->name('logout')->middleware('auth');
});
