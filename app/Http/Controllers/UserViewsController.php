<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewsController extends Controller
{
    public function showAllTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();

        $openTickets = $tickets->where('status', 'open')->take(3);
        $pendingTickets = $tickets->where('status', 'pending')->take(3);
        $successTickets = $tickets->where('status', 'success')->take(3);

        $openCount = $tickets->where('status', 'open')->count();
        $pendingCount = $tickets->where('status', 'pending')->count();
        $successCount = $tickets->where('status', 'success')->count();

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
            ->latest()
            ->get();
        return view('user.success-tickets', compact('tickets'));
    }

    public function showTicketHistory()
    {
        return view('user.tickets.history');
    }

    public function showEditTicket($id)
    {
        return view('user.tickets.edit', compact('id'));
    }
}
    


