<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Notes\AchiveController;
use App\Http\Controllers\Notes\BinController;
use App\Http\Controllers\Notes\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/create",[RegisterController::class,'create']);
Route::post("/login",[LoginController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get("/users",[UserController::class,'users']);
    Route::get("/logout",[LogoutController::class,'logout']);

    Route::post('/addNotes',[NoteController::class,'store']);
    Route::get('/getNotes',[NoteController::class,'getNotes']);
    Route::patch('/editNotes/{id}',[NoteController::class,'editNotes']);
    Route::patch('/cloneNotes/{id}',[NoteController::class,'cloneNotes']);
    Route::post('/updateNotes/{id}',[NoteController::class,'updateNotes']);
    // Route::delete('/deleteNotes/{id}',[NoteController::class,'deleteNotes']);
    Route::patch('/addAchive/{id}',[NoteController::class,'addAchive']);
    Route::patch('/addBin/{id}',[NoteController::class,'addBin']);

    Route::get('/getAchive',[AchiveController::class,'getAchiveNotes']);
    Route::patch('/deleteAchive/{id}',[AchiveController::class,'deleteAchive']);
    Route::patch('/rachieve/{id}',[AchiveController::class,'rachieve']);

    Route::get('/getBin',[BinController::class,'getBinNotes']);
    Route::patch('/recycleBin/{id}',[BinController::class,'recycleBin']);
    Route::delete('/fulldeleteBin/{id}',[BinController::class,'fullDeleteBin']);

});

