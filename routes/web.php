<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'Post'])->name('dashboard');

Route::get('/newPost', function () {
    return view('components.action-newpost');
})->name('newPost');



Route::get('/dashboard', [PostController::class, 'Post'])->name('dashboard');
Route::post('/create-post', [PostController::class, 'create'])->name('createPost');

Route::post('/create-comment/{postId}', [CommentController::class, 'addNewComment'])->name('createComment');