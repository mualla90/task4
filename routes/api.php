<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/books',[BookController::class,'store']);
Route::get('/books',[BookController::class,'index']);
Route::get('/books/{books}',[BookController::class,'show']);
Route::put('/books/{books}',[BookController::class,'update']);
Route::delete('/books/{book}',[BookController::class,'destroy']);



