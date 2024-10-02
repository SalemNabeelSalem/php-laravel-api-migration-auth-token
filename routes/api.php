<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/authors', function () {
    return response()->json(['message' => 'Hello there!']);
});

Route::post('/v1/authors', function (Request $request) {
    $name = $request->input('name');

    $address = $request->input('country');

    return response()->json(
        ['author' => $name, 'country' => $address]
    );
});

Route::post('/v1/users/register', UserController::class . '@register');

Route::post('/v1/users/login', UserController::class . '@login');

Route::get('/v1/articles', ArticleController::class . '@fetchArticles');

Route::post('/v1/articles', ArticleController::class . '@createArticle')->middleware('auth:sanctum');

Route::get('/v1/articles/{id}', ArticleController::class . '@showArticle');

Route::delete('/v1/articles/{id}', ArticleController::class . '@deleteArticle')->middleware('auth:sanctum');

Route::put('/v1/articles/{id}', ArticleController::class . '@updateArticle')->middleware('auth:sanctum');
