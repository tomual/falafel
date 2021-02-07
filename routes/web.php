<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('portfolio.layout');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'front'])->name('front');
Route::get('/works/{tag}', [App\Http\Controllers\HomeController::class, 'works'])->name('works');
Route::get('/work/{post}', [App\Http\Controllers\HomeController::class, 'work'])->name('work');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('posts', [PostsController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('posts', [PostsController::class, 'store'])->name('posts.store');
Route::get('posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
// Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::put('posts/{post}', [PostsController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::get('tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('tags', [TagsController::class, 'store'])->name('tags.store');
Route::get('tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::put('tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
Route::delete('tags/{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');
