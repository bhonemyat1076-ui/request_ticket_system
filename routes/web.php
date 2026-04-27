<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\User\UserDashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserViewsController;


Route::get('/', function () {
    if (Auth::check()) {
        // If already logged in, send them to their dashboard
        return Auth::user()->is_admin 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('user.dashboard');
    }

    // If not logged in (new user), show the register page
    return view('auth.register');
});

// Only Admins can enter here
Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tickets/open', [AdminDashboardController::class, 'openTickets'])->name('admin.tickets.open');
    Route::get('/admin/tickets/pending', [AdminDashboardController::class, 'pendingTickets'])->name('admin.tickets.pending');
    Route::get('/admin/tickets/success', [AdminDashboardController::class, 'successTickets'])->name('admin.tickets.success');
    Route::get('/admin/tickets/history', [AdminDashboardController::class, 'ticketHistory'])->name('admin.tickets.history');  
    Route::get('/admin/tickets/{ticket}', [AdminDashboardController::class, 'show'])->name('admin.tickets.show');
    Route::patch('/admin/tickets/{ticket}/status', [AdminDashboardController::class, 'updateStatus'])->name('admin.tickets.updateStatus');
  
});

// Regular Users can enter here
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/all-tickets', [UserViewsController::class, 'showAllTickets'])->name('user.all-tickets.show');
    Route::get('/user/open-tickets', [UserViewsController::class, 'showOpenTickets'])->name('user.open-tickets.show');
    Route::get('/user/pending-tickets', [UserViewsController::class, 'showPendingTickets'])->name('user.pending-tickets.show');
    Route::get('/user/success-tickets', [UserViewsController::class, 'showSuccessTickets'])->name('user.success-tickets.show');
    Route::get('/user/edit-tickets/{id}', [UserViewsController::class, 'showEditTicket'])->name('user.edit-tickets.show');
    Route::post('/user/update-tickets/{id}', [TicketController::class, 'updateTicket'])->name('user.update-tickets');


    // Ticket Routes
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
