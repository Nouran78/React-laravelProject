<?php

use App\Http\Controllers\bookingController;
use App\Http\Controllers\breakfastController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\userscontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// -------------------Admin panel------------------
Route::post('/addbreakfast',[breakfastController::class,'addbreakfast']);
Route::get('/admin/users', [userscontroller::class,'getUsers'])->middleware();
Route::post('/updatebreakfast/{id}',[breakfastController::class,'updatebreakfast']);
Route::delete('/deletebreakitem/{id}',[breakfastController::class,'deletebreakitem']);
Route::get('/showbooking',[bookingController::class,'showbooking']);


// ------------------Menu for users-------------------
Route::get('/breakfastmenu',[breakfastController::class,'breakfastmenu']);
Route::get('/breakfastitem/{id}',[breakfastController::class,'breakfastitem']);


Route::post('/register',[userscontroller::class,'register']);
Route::post('/login',[userscontroller::class,'login'])->name('login');
Route::get('/profile',[userscontroller::class,'profile']);
Route::get('/logout',[userscontroller::class,'logout']);
Route::post('/addbooking',[bookingController::class,'addbooking'])->middleware('auth');
Route::get('/profile/{user}',[profileController::class,'show']);
Route::get('/profile/edit', [profileController::class,'edit']);
Route::post('/profile/update', [profileController::class,'update']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
