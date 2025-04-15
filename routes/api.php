<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// TODO pendente a parte das inserções das TAGS
// Complaint
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

// TODO validar forma de remover ou mudar quando for like para deslike
// Votes
use App\Http\Controllers\VoteController;
Route::post('/vote', [VoteController::class, 'store']);
Route::put('/vote/{id}', [VoteController::class, 'update']);
Route::delete('/vote/{id}', [VoteController::class, 'destroy']);

// Tag
use App\Http\Controllers\TagController;
Route::get('/tag', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'show']);
Route::post('/tag', [TagController::class, 'store']);
Route::put('/tag/{id}', [TagController::class, 'update']);
Route::delete('/tag/{id}', [TagController::class, 'destroy']);

// Notification
use App\Http\Controllers\NotificationController;
Route::get('/notification/{id}', [NotificationController::class, 'show']); //Devolve as notificações do usuário
Route::post('/notification', [NotificationController::class, 'store']);
Route::delete('/notification/{id}', [NotificationController::class, 'destroy']);


// Company Request
// TODO ajustar o CompanyRequest table para que vincule para saber qual o id de empresa é 
use App\Http\Controllers\CompanyRequestController;
Route::get('/company-request', [CompanyRequestController::class, 'index']);
Route::post('/company-request', [CompanyRequestController::class, 'store']);
Route::put('/company-request/{id}', [CompanyRequestController::class, 'update']);
Route::delete('/company-request/{id}', [CompanyRequestController::class, 'destroy']);

// Company Request
use App\Http\Controllers\ReportController;
Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/{id}', [ReportController::class, 'show']);
Route::post('/report', [ReportController::class, 'store']);
Route::put('/report/{id}', [ReportController::class, 'update']);
Route::delete('/report/{id}', [ReportController::class, 'destroy']);

// TODO criar a tabela ComplaintTagControler