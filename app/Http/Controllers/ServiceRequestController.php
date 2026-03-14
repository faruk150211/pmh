<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
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
                'required',
                'string',
                'regex:/^[0-9\-\+\(\)\s]+$/',
                'max:20',
                'min:10'
            ],
            'service' => [
                'required',
                'string',
                'in:checkup,vaccination,emergency,followup'
            ],
            'message' => [
                'required',
                'string',
                'max:1000',
                'min:10'
            ]
        ], [
            'name.required' => 'Name is required.',
            'name.regex' => 'Name can only contain letters, spaces, hyphens, and apostrophes.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number format is invalid.',
            'phone.min' => 'Phone number must be at least 10 digits.',
            'service.required' => 'Please select a service.',
            'service.in' => 'The selected service is invalid.',
            'message.required' => 'Message is required.',
            'message.min' => 'Message must be at least 10 characters.',
            'message.max' => 'Message cannot exceed 1000 characters.'
        ]);

        try {
            \Log::info('Service Request: Starting form submission', ['email' => $validated['email']]);

            // Store the service request record in database FIRST to get the ID
            $serviceRequest = ServiceRequest::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service' => $validated['service'],
                'message' => $validated['message'],
                'status' => 'pending',
            ]);

            \Log::info('Service Request: Saved to database', ['id' => $serviceRequest->id, 'email' => $serviceRequest->email]);

            // Send confirmation email to customer
            try {
                \Log::info('Service Request: Sending customer confirmation email', ['to' => $serviceRequest->email]);
                Mail::to($serviceRequest->email)->send(
                    new \App\Mail\ServiceRequestConfirmation($serviceRequest)
                );
                \Log::info('Service Request: Customer confirmation email sent successfully');
            } catch (\Exception $mailError) {
                \Log::error('Service request confirmation email failed: ' . $mailError->getMessage(), ['exception' => $mailError]);
            }

            // Send notification email to admin
            try {
                $adminEmail = env('ADMIN_EMAIL', config('mail.from.address'));
                \Log::info('Service Request: Sending admin notification email', ['to' => $adminEmail]);
                Mail::to($adminEmail)->send(
                    new \App\Mail\ServiceRequestNotification($serviceRequest)
                );
                \Log::info('Service Request: Admin notification email sent successfully');
            } catch (\Exception $mailError) {
                \Log::error('Service request admin notification failed: ' . $mailError->getMessage(), ['exception' => $mailError]);
            }

            return redirect()->to(url('/') . '#contact-preview')->with('success', 'Thank you! Your service request has been submitted successfully. We will contact you shortly to confirm your appointment.');
        } catch (\Exception $e) {
            \Log::error('Service request error: ' . $e->getMessage(), ['exception' => $e]);
            return back()->with('error', 'An error occurred while processing your request. Please try again later.')->withInput();
        }
    }

    /**
     * Display all service requests
     */
    public function index()
    {
        $serviceRequests = ServiceRequest::latest('created_at')->paginate(20);
        $totalPending = ServiceRequest::where('status', 'pending')->count();

        return view('backend.service-requests.index', compact('serviceRequests', 'totalPending'));
    }

    /**
     * Display a specific service request
     */
    public function show(ServiceRequest $serviceRequest)
    {
        return view('backend.service-requests.show', compact('serviceRequest'));
    }

    /**
     * Update service request status
     */
    public function updateStatus(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $serviceRequest->update([
            'status' => $validated['status']
        ]);

        $message = match($validated['status']) {
            'approved' => 'Service request approved successfully.',
            'rejected' => 'Service request rejected successfully.',
            default => 'Status updated successfully.'
        };

        return back()->with('success', $message);
    }

    /**
     * Add or update admin notes
     */
    public function addNotes(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'admin_notes' => 'required|string|max:1000'
        ]);

        $serviceRequest->update([
            'admin_notes' => $validated['admin_notes']
        ]);

        return back()->with('success', 'Notes added successfully.');
    }

    /**
     * Delete a service request
     */
    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        return redirect()->route('admin.service-requests.index')->with('success', 'Service request deleted successfully.');
    }
}
