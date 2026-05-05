<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminDashboardController extends Controller
{
   public function index()
{
    // Fetch only the 5 most recent tickets with an 'open' status
    $recentOpenTickets = Ticket::with('user')
        ->where('status', 'open')
        ->latest()
        ->take(5)
        ->get();

    // You can still pass counts for your summary cards here
    $openCount = Ticket::where('status', 'open')->count();

    return view('admin.dashboard', compact('recentOpenTickets', 'openCount'));
}


public function show(Ticket $ticket)
{
    // Load the user relationship to show requester details
    $ticket->load('user');
    return view('admin.tickets.show', compact('ticket'));
}

public function updateStatus(Request $request, Ticket $ticket)
{
    $validated = $request->validate([
        'status' => 'required|in:open,pending,success,closed,resolved',
    ]);

    $status = $validated['status'] === 'closed' ? 'success' : $validated['status'];
    $ticket->update(['status' => $status]);

    return back()->with('status', 'Ticket status updated to ' . ucfirst($status));
}

public function openTickets()
{
    $tickets = Ticket::with('user')
        ->where('status', 'open')
        ->latest()
        ->paginate(15);

    return view('admin.tickets.open', compact('tickets'));
}

public function pendingTickets()
{
    $tickets = Ticket::with('user')
        ->where('status', 'pending')
        ->latest()
        ->paginate(15);

    return view('admin.tickets.pending', compact('tickets'));
}

public function successTickets()
{
    $tickets = Ticket::with('user')
        ->where('status', 'success')
        ->where('created_at', '>=', now()->subMonth())
        ->latest()
        ->paginate(15);

    return view('admin.tickets.success', compact('tickets'));
}

public function ticketHistory()
{
    $historyTickets = Ticket::with('user')
        ->where('status', 'success')
        ->where('created_at', '<', now()->subMonth())
        ->latest()
        ->paginate(15);

    return view('admin.tickets.history', compact('historyTickets'));
}
}
