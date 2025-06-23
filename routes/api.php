<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Default route provided by Laravel, protected by Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Our API routes for posts, protected by Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('posts', PostController::class);
    // You could add /posts/{post} for show, update, delete
});

Route::get('/test-api', function () {
    return response()->json(['message' => 'API is working']);
});