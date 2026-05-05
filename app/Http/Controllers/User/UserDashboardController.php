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
        $openTickets = Ticket::where('user_id', $user->id)->where('status', 'open')->count();
        $pendingTickets = Ticket::where('user_id', $user->id)->where('status', 'pending')->count();
        $successTickets = Ticket::where('user_id', $user->id)
            ->where('status', 'success')
            ->where('created_at', '>=', now()->subMonth())
            ->count();
        $recentTickets = Ticket::where('user_id', $user->id)->latest()->take(5)->get();

        return view('user.dashboard', compact(
            'totalTickets',
            'openTickets',
            'pendingTickets',
            'successTickets',
            'recentTickets'
        ));
    }
}