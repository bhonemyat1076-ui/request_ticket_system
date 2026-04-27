<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Show the form for creating a new ticket.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created ticket in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the input
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => ['required', 'in:low,medium,high'],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'], // Max 2MB
        ]);

        $attachmentPath = null;

        // 2. Handle the file upload if it exists
        if ($request->hasFile('attachment')) {
            // Stores file in storage/app/public/tickets
            $attachmentPath = $request->file('attachment')->store('tickets', 'public');
        }

        // 3. Create the ticket record
        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'attachment' => $attachmentPath,
            'status' => 'open', // Default status
        ]);

        // 4. Redirect with a success message
        return redirect()->route('user.dashboard')
            ->with('status', 'Ticket submitted successfully!');
    }

   public function updateTicket(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Ensure the authenticated user owns the ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            // Only allow image updates if you want to support re-uploading
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle attachment update if a new file is uploaded
        if ($request->hasFile('attachment')) {
            // Delete the old file if it exists to save storage space
            if ($ticket->attachment) {
                Storage::disk('public')->delete($ticket->attachment);
            }
            $path = $request->file('attachment')->store('attachments', 'public');
            $validated['attachment'] = $path;
        }

        // Update the ticket with validated data
        $ticket->update($validated);

        return redirect()->route('user.all-tickets.show')
            ->with('status', 'Ticket updated successfully!');
    }

}
