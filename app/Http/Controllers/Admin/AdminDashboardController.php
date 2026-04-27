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
    $request->validate([
        'status' => 'required|in:open,pending,resolved,closed',
    ]);

    $ticket->update(['status' => $request->status]);

    return back()->with('status', 'Ticket status updated to ' . ucfirst($request->status));
}

public function openTickets()
{
    $tickets = Ticket::with('user')
        ->where('status', 'open')
        ->latest()
        ->paginate(15); // Show more per page here than on the dashboard

    return view('admin.tickets.open', compact('tickets'));
}
}
