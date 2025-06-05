<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserDataController;
use App\Http\Controllers\Api\AdminDataController;
use App\Http\Controllers\Api\TicketDataController;
use App\Http\Controllers\Api\TypeDataController;
use App\Http\Controllers\Api\AssignedTicketDataController;
use App\Http\Controllers\Api\CommentDataController;
use App\Http\Controllers\Api\EventHistoryDataController;
use App\Http\Controllers\Api\TicketApiController;

Route::prefix('admin')->group(function () {
    // Rutas públicas
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);


    Route::middleware('auth:api')->get('/test', function (Request $request) {
        return response()->json([
            'auth_user' => $request->user(),
        ]);
    });

    
    // Rutas protegidas con Passport
    Route::middleware('auth:api')->group(function () {
        Route::get('/users', [UserDataController::class, 'indexUsers']);
        Route::get('/admins', [AdminDataController::class, 'indexAdmins']);
        Route::get('/types', [TypeDataController::class, 'indexTypes']);

        Route::get('/tickets', [TicketDataController::class, 'indexTickets']);
        Route::get('/assigned-tickets', [AssignedTicketDataController::class, 'indexAssignedTickets']);
        Route::patch('/tickets/{ticket}/close', [TicketApiController::class, 'close']);
        Route::patch('/tickets/{ticket}/reopen', [TicketApiController::class, 'reopen']);

        Route::get('/tickets/{ticket}/comments', [CommentDataController::class, 'viewComments']);

        Route::delete('/comments/delete/{comment}', [CommentDataController::class, 'deleteComment']);

        Route::get('/historyEvents', [EventHistoryDataController::class, 'indexEventHistory']);


    });

});


