<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomCors;
Route::middleware([CustomCors::class])->group(function () {
Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/login', [AuthController::class, 'showLogin']);
Route::post('/api/login', [AuthController::class, 'login']);

Route::post('/api/logout', [AuthController::class, 'logout'])->name('logout');

// register
Route::get('/api/register', [AuthController::class, 'showRegister']);
Route::post('/api/register', [AuthController::class, 'register']);
// // 
// Route::post('/api/logout',[AuthController::class,'logout']);
});
Route::group([
    "middleware"=>['auth:sanctum']
],function(){
    Route::get('/api/profile',[AuthController::class]);
    Route::get('/api/logout', [AuthController::class]);

});