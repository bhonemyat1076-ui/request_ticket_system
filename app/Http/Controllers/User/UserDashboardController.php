<?php

namespace App\Http\Controllers\User; // Add \User here

use App\Http\Controllers\Controller; // Add this line too
use App\Models\Ticket;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Count tickets by status for the current user
        $totalTickets = Ticket::where('user_id', $user->id)->count();
        $pendingTickets = Ticket::where('user_id', $user->id)->where('status', 'pending')->count();
        $resolvedTickets = Ticket::where('user_id', $user->id)->where('status', 'resolved')->count();

        // Get the latest tickets for the table
        $latestTickets = Ticket::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'totalTickets', 
            'pendingTickets', 
            'resolvedTickets', 
            'latestTickets'
        ));
    }
}