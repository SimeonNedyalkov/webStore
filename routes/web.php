<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api/login', function () {
    return view('api.login');
});
Route::post('/api/login',[AuthController::class,'login']);
// register
Route::get('/api/register', function () {
    return view('api.register');
});
Route::post('/api/register',[AuthController::class,'register']);
// // 
// Route::post('/api/logout',[AuthController::class,'logout']);

Route::group([
    "middleware"=>['auth:sanctum']
],function(){
    Route::get('profile',AuthController::class,'profile')
    Route::get('logout',AuthController::class,'logout')
})