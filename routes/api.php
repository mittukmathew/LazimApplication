<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;



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

Route::post('/login', [AuthController::class, 'login']);

// Route::post('/logout', [AuthController::class, 'logout']);


 Route::middleware('auth:sanctum')->group(function () {
    Route::post('/createBlog', [TaskController::class, 'createBlog']);
    Route::get('/getBlog', [TaskController::class, 'getBlog']);
    Route::get('/getBlogById/{id}', [TaskController::class, 'blogById']);
    Route::put('/updateBlogById/{id}', [TaskController::class, 'updateBlog']);
    Route::delete('/blogDelete/{id}',  [TaskController::class, 'blogDelete']);
    Route::post('/logout', [TaskController::class, 'logout']);
 });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    
});



