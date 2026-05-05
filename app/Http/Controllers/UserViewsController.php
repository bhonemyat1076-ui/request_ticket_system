<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewsController extends Controller
{
    public function showAllTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->latest()
            ->get();

        $openTickets = $tickets->where('status', 'open')->take(3);
        $pendingTickets = $tickets->where('status', 'pending')->take(3);

        $recentSuccessTickets = Ticket::where('user_id', Auth::id())
            ->where('status', 'success')
            ->where('created_at', '>=', now()->subMonth())
            ->latest()
            ->get();

        $successTickets = $recentSuccessTickets->take(3);

        $openCount = $tickets->where('status', 'open')->count();
        $pendingCount = $tickets->where('status', 'pending')->count();
        $successCount = $recentSuccessTickets->count();

        return view('user.all-tickets', compact(
            'openTickets', 
            'pendingTickets', 
            'successTickets',
            'openCount',
            'pendingCount',
            'successCount'
        ));
    }

    public function showOpenTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->where('status', 'open')
            ->latest()
            ->get();
        return view('user.open-tickets', compact('tickets'));
    }

    public function showPendingTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->latest()
            ->get();
        return view('user.pending-tickets', compact('tickets'));
    }

    public function showSuccessTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())
            ->where('status', 'success')
            ->where('created_at', '>=', now()->subMonth())
            ->latest()
            ->get();

        return view('user.success-tickets', compact('tickets'));
    }

    public function showTicketHistory()
    {
        $historyTickets = Ticket::where('user_id', Auth::id())
            ->where('status', 'success')
            ->where('created_at', '<', now()->subMonth())
            ->latest()
            ->paginate(15);

        return view('user.tickets.history', compact('historyTickets'));
    }

    public function showEditTicket($id)
    {
            $tickets = Ticket::where('user_id', Auth::id())->findOrFail($id);
            return view('user.edit-tickets', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::where('user_id', Auth::id())->findOrFail($id);

        return view('user.tickets.show', compact('ticket'));
    }
}
    


