<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventHistoryController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\User\UserNotificationController;
use App\Http\Controllers\Admin\AdminEventHistoryController;
use App\Http\Controllers\Admin\AdminAdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\LanguageController;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;



Route::middleware(['web', \App\Http\Middleware\LanguageMiddleware::class])->group(function () {
    

    Route::get('lang/{locale}', [LanguageController::class, 'switchLanguage'])->name('change.language');


    Route::prefix('{locale}')->group(function () {

        Route::get('/', [HomeController::class, 'showOptions']) -> name('login');

        Route::get('login', [UserAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [UserAuthController::class, 'login'])->name('login.submit');
        Route::get('register', [UserAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [UserAuthController::class, 'register']);
        Route::post('logout', [UserAuthController::class, 'logOut'])->name('logout');


        Route::middleware('auth:user')->prefix('user')->group(function() {
            //Gestión de Tickets
            Route::get('tickets', [TicketController::class, 'showAll'])->name('user.tickets.index');
            Route::get('tickets/create', [TicketController::class, 'showCreateForm']) -> name('user.tickets.create');
            Route::post('tickets', [TicketController::class, 'create']) -> name('user.tickets.store');
            Route::get('tickets/{ticket}', [TicketController::class, 'show']) -> name('user.tickets.show');
            Route::post('tickets/{ticket}/comment', [CommentController::class, 'addComment'])->name('ticket.add.comment');

            Route::post('tickets/{ticket}/validate', [TicketController::class, 'validateResolution'])->name('user.tickets.validate');

            Route::get('notifications', [UserNotificationController::class, 'showNotificationsView'])->name('user.notifications');
            Route::patch('notifications/{id}/read', [UserNotificationController::class, 'markAsRead'])->name('user.notifications.read');

        });



        Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm']) -> name('admin.login');
        Route::post('/admin/login', [AdminAuthController::class, 'login']);
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']) -> name('admin.logout');


        Route::middleware('auth:admin')->prefix('admin')->group(function() {

            // Route::prefix('tickets')->controller(AdminTicketController::class)->group(function () {
            //     Route::get('/', 'manageTickets')->name('admin.manage.tickets');
            //     Route::get('/assigned', 'showAssignedTickets')->name('admin.show.assigned.tickets');
            //     Route::get('/{ticket}', 'viewTicket')->name('admin.view.ticket');
            //     Route::patch('/{ticket}/update', 'updateTicketStatus')->name('admin.update.ticket');
            //     Route::post('/{ticket}/assign', 'assignTicket')->name('admin.assign.ticket');
            // });

            //Gestión de Tickets
            Route::get('tickets', [AdminTicketController::class, 'manageTickets'])->name('admin.manage.tickets');
            Route::get('tickets/{ticket}', [AdminTicketController::class, 'viewTicket'])->name('admin.view.ticket');
            Route::patch('tickets/{ticket}/update', [AdminTicketController::class, 'updateTicketStatus'])->name('admin.update.ticket');
            Route::patch('/tickets/{ticketId}/close', [TicketController::class, 'closeTicket'])->name('admin.close.ticket');
            Route::post('/tickets/{ticketId}/reopen', [TicketController::class, 'reopenTicket'])->name('admin.reopen.ticket');
            Route::post('/admin/ticket/{ticket}/assign', [AdminTicketController::class, 'assignTicket'])->name('admin.assign.ticket');
            Route::get('/admin/tickets/assigned', [AdminTicketController::class, 'showAssignedTickets'])->name('admin.show.assigned.tickets');

            //Comentarios en Tickets
            Route::post('tickets/{ticket}/comment', [CommentController::class, 'addComment'])->name('admin.add.comment');
            Route::delete('comments/{comment}', [CommentController::class, 'deleteComment'])->name('admin.delete.comment');
            Route::get('tickets/{ticket}/comments', [CommentController::class, 'viewComments'])->name('admin.view.comments');

            //Gestión de Usuarios
            Route::get('/admin/users', [AdminDashboardController::class, 'showManageDashboard'])->name('admin.manage.dashboard');
            Route::get('/admin/list/users', [AdminUserController::class, 'showListUsers'])->name('admin.dashboard.list.users');
            Route::get('/admin/users/dashboard', [AdminUserController::class, 'showAddDashboard'])->name('admin.dashboard.add');

            Route::get('/admin/users/create', [AdminUserController::class, 'createUser'])->name('admin.users.create');
            Route::post('/admin/users', [AdminUserController::class, 'storeUser'])->name('admin.users.store');

            Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'editUser'])->name('admin.users.edit');
            Route::put('/admin/users/{user}', [AdminUserController::class, 'updateUser'])->name('admin.users.update');

            Route::get('/admin/users/{user}/confirm-delete', [AdminUserController::class, 'confirmDeleteUser'])->name('admin.users.confirmDelete');
            Route::delete('/admin/users/{user}', [AdminUserController::class, 'confirmDeleteUserPost'])->name('admin.users.destroy');

            //Gestión de Administradores
            Route::get('/admin/list/admins', [AdminAdminController::class, 'showListAdmins'])->name('admin.dashboard.list.admins');

            Route::get('/admin/admins/create', [AdminAdminController::class, 'createAdmin'])->name('admin.admins.create');
            Route::post('/admin/admins', [AdminAdminController::class, 'storeAdmin'])->name('admin.admins.store');

            Route::get('/admin/admins/{admin}/edit', [AdminAdminController::class, 'editAdmin'])->name('admin.admins.edit');
            Route::put('/admin/admins/{admin}', [AdminAdminController::class, 'updateAdmin'])->name('admin.admins.update');

            Route::get('/admin/admins/{admin}/confirm-delete', [AdminAdminController::class, 'confirmDeleteAdmin'])->name('admin.admins.confirmDelete');
            Route::delete('/admin/admins/{admin}', [AdminAdminController::class, 'confirmDeleteAdminPost'])->name('admin.admins.destroy');

            //Gestión de Tipos de Ticket
            Route::get('types', [TypesController::class, 'index'])->name('admin.types.index');
            Route::get('types/create', [TypesController::class, 'create'])->name('admin.types.create');
            Route::post('types', [TypesController::class, 'store'])->name('admin.types.store');
            Route::get('types/{type}/edit', [TypesController::class, 'edit'])->name('admin.types.edit');
            Route::patch('types/{type}', [TypesController::class, 'update'])->name('admin.types.update');
            Route::delete('types/{type}', [TypesController::class, 'destroy'])->name('admin.types.destroy');
            Route::get('types/{type}/confirm-delete', [TypesController::class, 'confirmDelete'])->name('admin.types.confirmDelete');

            //Notificaciones
            Route::get('notifications', [AdminNotificationController::class, 'showNotifications'])->name('admin.notifications');
            Route::patch('notifications/{notificationId}/read', [AdminNotificationController::class, 'markAsRead'])->name('admin.notifications.read');

            //Historial de Eventos
            Route::get('/admin/history/events', [EventHistoryController::class, 'indexEventHistory'])->name('admin.history.events');

        });


    });

});


