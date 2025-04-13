<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomCors;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// login
Route::get('/api/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/api/login', [AuthController::class, 'login'])->name('login');

// logout
Route::post('/api/logout', [AuthController::class, 'logout'])->name('logout');

// register
Route::get('/api/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::post('/api/register', [AuthController::class, 'register'])->name('register');

Route::group([
    "middleware"=>['auth:sanctum']
],function(){
    Route::get('/api/profile',[AuthController::class]);
    Route::get('/api/logout', [AuthController::class]);

});