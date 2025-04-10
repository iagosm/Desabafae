<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Complaint
// TODO pendente a parte das inserções das TAGS
use App\Http\Controllers\ComplaintController;
Route::get('/complaint', [ComplaintController::class ,'index']);
Route::post('/complaint', [ComplaintController::class ,'store']);
Route::get('/complaint/{id}', [ComplaintController::class ,'show']);
Route::put('/complaint/{id}', [ComplaintController::class ,'update']);
Route::delete('/complaint/{id}', [ComplaintController::class ,'destroy']);

// Commments
use App\Http\Controllers\CommentController;
Route::get('/comment/complaint/{id}', [CommentController::class, 'getAllComentsByComplaint']); // Devolve todos os comentários da reclamação
Route::get('/comment/{id}', [CommentController::class, 'getComment']); // Devolve todos os comentários da reclamação
Route::post('/comment', [CommentController::class, 'store']);
Route::put('/comment/{id}', [CommentController::class ,'update']);
Route::delete('/comment/{id}', [CommentController::class ,'destroy']);

// Votes
// TODO validar forma de remover ou mudar quando for like para deslike
use App\Http\Controllers\VoteController;
Route::post('/vote', [VoteController::class, 'store']);