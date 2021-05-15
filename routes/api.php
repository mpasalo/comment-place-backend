<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SecondaryCommentController;
use App\Http\Controllers\TertiaryCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts', [PostController::class, 'index'])->name('post.index');

Route::get('comments/{post}', [CommentController::class, 'index'])->name('comment.index');
Route::post('comments', [CommentController::class, 'store'])->name('comment.store');

Route::get('secondary-comments/{comment}', [SecondaryCommentController::class, 'index'])->name('secondary-comment.index');
Route::post('secondary-comments', [SecondaryCommentController::class, 'store'])->name('secondary-comment.store');

Route::get('tertiary-comments/{secondary}', [TertiaryCommentController::class, 'index'])->name('tertiary-comment.index');
Route::post('tertiary-comments', [TertiaryCommentController::class, 'store'])->name('tertiary-comment.store');
