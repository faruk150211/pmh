<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        $unreadCount = ContactMessage::where('is_read', false)->count();
        return view('backend.contact-messages.index', compact('messages', 'unreadCount'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Mark as read
        if (!$message->is_read) {
            $message->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return view('backend.contact-messages.show', compact('message'));
    }

    public function updateStatus(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:pending,replied,archived',
        ]);

        $message->update($validated);
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message status updated successfully!');
    }

    public function addNotes(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $validated = $request->validate([
            'admin_notes' => 'nullable|max:5000',
        ]);

        $message->update($validated);
        return back()->with('success', 'Admin notes saved successfully!');
    }

    public function delete($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.contact-messages.index')->with('success', 'Message deleted successfully!');
    }

    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        if (!$message->is_read) {
            $message->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }
        return back()->with('success', 'Message marked as read!');
    }

    public function markAsUnread($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update([
            'is_read' => false,
            'read_at' => null,
        ]);
        return back()->with('success', 'Message marked as unread!');
    }
}
