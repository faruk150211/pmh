@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0" style="color: #2c3e50; font-weight: 600;">Contact Messages</h1>
                <span class="badge bg-info">{{ $unreadCount }} Unread</span>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
        <div class="card-body">
            @if($messages->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Status</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr style="@if(!$message->is_read) background-color: #f0f8ff; @endif">
                                    <td>
                                        @if(!$message->is_read)
                                            <span class="badge bg-primary">New</span>
                                        @else
                                            @if($message->status === 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($message->status === 'replied')
                                                <span class="badge bg-success">Replied</span>
                                            @else
                                                <span class="badge bg-secondary">Archived</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $message->name }}</strong>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                                    </td>
                                    <td>{{ Str::limit($message->subject, 40) }}</td>
                                    <td>
                                        <small class="text-muted">{{ $message->created_at->format('M d, Y H:i') }}</small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('admin.contact-messages.show', $message->id) }}" class="btn btn-primary btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contact-messages.delete', $message->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        <i class="fas fa-inbox" style="font-size: 2rem; opacity: 0.5;"></i>
                                        <p class="mt-2">No contact messages yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $messages->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox" style="font-size: 3rem; color: #bbb;"></i>
                    <p class="mt-3 text-muted">No contact messages yet. When customers submit the contact form, they will appear here.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa !important;
    }
</style>
@endsection
