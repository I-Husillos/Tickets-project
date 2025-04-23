<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'showOptions']) -> name('login');

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login.submit');
Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);


Route::middleware('auth:user')->prefix('user')->group(function() {
    Route::get('tickets', [TicketController::class, 'showAll'])->name('user.tickets.index');
    Route::get('tickets/create', [TicketController::class, 'create']) -> name('user.tickets.create');
    Route::post('tickets', [TicketController::class, 'store']) -> name('user.tickets.store');
    Route::get('tickets/{ticket}', [TicketController::class, 'show']) -> name('user.tickets.show');
    Route::post('tickets/{ticket}/comment', [CommentController::class, 'addComment'])->name('ticket.add.comment');

    Route::post('tickets/{ticket}/validate', [TicketController::class, 'validateResolution'])->name('user.tickets.validate');

    Route::get('notifications', [UserController::class, 'showNotificationsView'])->name('user.notifications');
    Route::patch('notifications/{id}/read', [UserController::class, 'markAsRead'])->name('user.notifications.read');

    

    Route::post('logout', [UserController::class, 'logOut'])->name('logout');
});



Route::get('/admin/login', [AdminController::class, 'showLoginForm']) -> name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']) -> name('admin.login.submit');

Route::middleware('auth:admin')->prefix('admin')->group(function() {

    // Rutas de administración de tickets
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('tickets', [AdminController::class, 'manageTickets'])->name('admin.manage.tickets');
    Route::get('tickets/{ticket}', [AdminController::class, 'viewTicket'])->name('admin.view.ticket');

    Route::get('types', [TypesController::class, 'index'])->name('admin.types.index');
    Route::get('types/create', [TypesController::class, 'create'])->name('admin.types.create');
    Route::post('types', [TypesController::class, 'store'])->name('admin.types.store');
    Route::get('types/{type}/edit', [TypesController::class, 'edit'])->name('admin.types.edit');
    Route::patch('types/{type}', [TypesController::class, 'update'])->name('admin.types.update');
    Route::delete('types/{type}', [TypesController::class, 'destroy'])->name('admin.types.destroy');
    // Rutas de confirmación de eliminación
    Route::get('types/{type}/confirm-delete', [TypesController::class, 'confirmDelete'])->name('admin.types.confirmDelete');


    // Rutas de notificaciones
    Route::get('notifications', [AdminController::class, 'showNotifications'])->name('admin.notifications');
    Route::patch('notifications/{notificationId}/read', [AdminController::class, 'markAsRead'])->name('admin.notifications.read');

    
    Route::post('/tickets/{ticketId}/close', [TicketController::class, 'closeTicket'])->name('admin.close.ticket');
    Route::post('/tickets/{ticketId}/reopen', [TicketController::class, 'reopenTicket'])->name('admin.reopen.ticket');
    Route::patch('tickets/{ticket}/update', [AdminController::class, 'updateTicketStatus'])->name('admin.update.ticket');
    Route::post('/admin/ticket/{ticket}/assign', [AdminController::class, 'assignTicket'])->name('admin.assign.ticket');
    Route::get('/admin/tickets/assigned', [AdminController::class, 'showAssignedTickets'])->name('admin.show.assigned.tickets');
    
    // Rutas de comentarios en tickets
    Route::post('tickets/{ticket}/comment', [CommentController::class, 'addComment'])->name('admin.add.comment');
    Route::delete('comments/{comment}', [CommentController::class, 'deleteComment'])->name('admin.delete.comment');
    Route::get('tickets/{ticket}/comments', [CommentController::class, 'viewComments'])->name('admin.view.comments');

    
    // Ruta de cierre de sesión
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

});



