<?php

use App\Core\Routes\Route;

Route::get('/jooyeshgar/index',[HomeController::class,'index']);

Route::get('/jooyeshgar/login',[LoginController::class,'index']);
Route::post('/jooyeshgar/login',[LoginController::class,'store']);


Route::get('/jooyeshgar/logoute',[LoginController::class,'logoute']);

Route::get('/jooyeshgar/register',[RegisterController::class,'index']);
Route::post('/jooyeshgar/register/store',[RegisterController::class,'store']);
Route::get('/jooyeshgar/userdetail',[UserController::class,'index']);
Route::get('/jooyeshgar/showall',[UserController::class,'showall']);

Route::get('/jooyeshgar/editdetail/{id}',[UserController::class,'edit']);
Route::post('/jooyeshgar/editdetail',[UserController::class,'update']);

Route::get('/jooyeshgar/description/{id}',[UserController::class,'showDescription']);
Route::post('/jooyeshgar/description/{id}/update',[UserController::class,'updateDescription']);
// Route::get('/jooyeshgar/index/{salam}',[HomeController::class,'index']);