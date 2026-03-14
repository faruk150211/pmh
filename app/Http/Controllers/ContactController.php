<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Strict validation
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s\'-]+$/'
            ],
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'phone' => [
                'nullable',
                'string',
                'regex:/^[0-9\-\+\(\)\s]+$/',
                'max:20'
            ],
            'subject' => [
                'required',
                'string',
                'max:255',
                'min:5'
            ],
            'message' => [
                'required',
                'string',
                'max:5000',
                'min:10'
            ]
        ], [
            'name.required' => 'Name is required.',
            'name.regex' => 'Name can only contain letters, spaces, hyphens, and apostrophes.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.regex' => 'Phone number format is invalid.',
            'subject.required' => 'Subject is required.',
            'subject.min' => 'Subject must be at least 5 characters.',
            'message.required' => 'Message is required.',
            'message.min' => 'Message must be at least 10 characters.'
        ]);

        try {
            // Save to database first
            ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'is_read' => false,
                'status' => 'pending',
            ]);

            // Send email to admin - using configured admin email or from address as fallback
            $adminEmail = env('ADMIN_EMAIL', config('mail.from.address'));
            Mail::to($adminEmail)->send(
                new \App\Mail\ContactFormMail($validated)
            );

            return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Contact form email failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while sending your message. Please try again later.')->withInput();
        }
    }
}

