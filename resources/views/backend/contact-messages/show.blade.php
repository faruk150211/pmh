@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0" style="color: #2c3e50; font-weight: 600;">Message Details</h1>
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Messages
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <!-- Message Content -->
        <div class="col-lg-8">
            <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                    <h5 class="mb-0" style="color: #2c3e50; font-weight: 600;">{{ $message->subject }}</h5>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <!-- Sender Info -->
                    <div class="mb-4 pb-4" style="border-bottom: 1px solid #eee;">
                        <div class="row">
                            <div class="col-md-6">
                                <p style="color: #999; font-size: 0.9rem; margin-bottom: 5px;">From</p>
                                <p style="font-size: 1.1rem; font-weight: 600; margin: 0;">{{ $message->name }}</p>
                                <p style="color: #0084d6; margin: 5px 0;">
                                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                </p>
                                @if($message->phone)
                                    <p style="color: #666; margin: 5px 0;">
                                        <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a>
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p style="color: #999; font-size: 0.9rem; margin-bottom: 5px;">Received</p>
                                <p style="font-size: 0.95rem; margin: 0;">{{ $message->created_at->format('F d, Y \a\t H:i A') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Message Body -->
                    <div class="mb-4">
                        <div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; border-left: 4px solid #0084d6;">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 15px 20px;">
                    <h6 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                        <i class="fas fa-tasks me-2"></i>Status
                    </h6>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <form action="{{ route('admin.contact-messages.update-status', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="status" class="form-label" style="font-weight: 500;">Change Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending" @if($message->status === 'pending') selected @endif>Pending</option>
                                <option value="replied" @if($message->status === 'replied') selected @endif>Replied</option>
                                <option value="archived" @if($message->status === 'archived') selected @endif>Archived</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-save me-2"></i>Update Status
                        </button>
                    </form>

                    <!-- Mark as Read/Unread -->
                    <div class="mt-3 pt-3" style="border-top: 1px solid #eee;">
                        @if(!$message->is_read)
                            <form action="{{ route('admin.contact-messages.mark-as-read', $message->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm w-100">
                                    <i class="fas fa-check me-2"></i>Mark as Read
                                </button>
                            </form>
                        @else
                            <form action="{{ route('admin.contact-messages.mark-as-unread', $message->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm w-100">
                                    <i class="fas fa-redo me-2"></i>Mark as Unread
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Info Card -->
            <div class="card mb-4" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-left: 4px solid #0084d6;">
                <div class="card-body" style="padding: 20px;">
                    <h6 style="color: #2c3e50; font-weight: 600; margin-bottom: 15px;">
                        <i class="fas fa-info-circle me-2"></i>Quick Info
                    </h6>
                    <div style="font-size: 0.9rem;">
                        <p class="mb-2">
                            <span style="color: #999;">Message ID:</span><br>
                            <strong>#{{ $message->id }}</strong>
                        </p>
                        <p class="mb-2">
                            <span style="color: #999;">Status:</span><br>
                            @if($message->status === 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($message->status === 'replied')
                                <span class="badge bg-success">Replied</span>
                            @else
                                <span class="badge bg-secondary">Archived</span>
                            @endif
                        </p>
                        <p class="mb-0">
                            <span style="color: #999;">Read Status:</span><br>
                            @if($message->is_read)
                                <span class="badge bg-info">Read on {{ $message->read_at->format('M d, Y H:i') }}</span>
                            @else
                                <span class="badge bg-danger">Unread</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Delete Card -->
            <div class="card" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-left: 4px solid #e74c3c;">
                <div class="card-body" style="padding: 20px;">
                    <p style="font-size: 0.85rem; color: #999; margin: 0 0 15px 0;">
                        <i class="fas fa-exclamation-triangle me-1"></i>Danger Zone
                    </p>
                    <form action="{{ route('admin.contact-messages.delete', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100 btn-sm">
                            <i class="fas fa-trash me-2"></i>Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Admin Notes Section -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef; padding: 20px;">
                    <h6 class="mb-0" style="color: #2c3e50; font-weight: 600;">
                        <i class="fas fa-sticky-note me-2"></i>Admin Notes
                    </h6>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <form action="{{ route('admin.contact-messages.add-notes', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="admin_notes" class="form-label" style="font-weight: 500;">Add or Edit Notes</label>
                            <textarea name="admin_notes" id="admin_notes" class="form-control" rows="4" placeholder="Add internal notes about this message...">{{ $message->admin_notes }}</textarea>
                            <small class="form-text text-muted">These notes are only visible to admin staff and help you track follow-ups and actions.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Save Notes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
