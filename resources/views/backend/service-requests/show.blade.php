@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">
                <i class="fas fa-file-alt"></i> Service Request #{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}
            </h2>
            <small class="text-muted">Submitted on {{ $serviceRequest->created_at->format('F d, Y \a\t h:i A') }}</small>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.service-requests.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>

    {{-- Alert Messages --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        {{-- Main Content --}}
        <div class="col-lg-8">
            {{-- Customer Information --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user"></i> Customer Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Full Name</strong>
                            <p class="text-muted mb-0">{{ $serviceRequest->name }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Service Requested</strong>
                            <p class="text-muted mb-0">
                                <span class="badge bg-info" style="font-size: 12px; padding: 6px 10px;">
                                    {{ ucfirst(str_replace('_', ' ', $serviceRequest->service)) }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Email Address</strong>
                            <p class="text-muted mb-0">
                                <a href="mailto:{{ $serviceRequest->email }}">{{ $serviceRequest->email }}</a>
                            </p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Phone Number</strong>
                            <p class="text-muted mb-0">
                                <a href="tel:{{ $serviceRequest->phone }}">{{ $serviceRequest->phone }}</a>
                            </p>
                        </div>
                    </div>

                    @if($serviceRequest->scheduled_date)
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Scheduled Date</strong>
                                <p class="text-muted mb-0">
                                    {{ \Carbon\Carbon::parse($serviceRequest->scheduled_date)->format('F d, Y H:i A') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Request Message --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-comment"></i> Customer Message</h5>
                </div>
                <div class="card-body">
                    <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #0084d6; border-radius: 4px; line-height: 1.6;">
                        {{ $serviceRequest->message }}
                    </div>
                </div>
            </div>

            {{-- Admin Notes --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-sticky-note"></i> Internal Notes</h5>
                </div>
                <div class="card-body">
                    @if($serviceRequest->admin_notes)
                        <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #28a745; border-radius: 4px; margin-bottom: 15px; line-height: 1.6;">
                            {{ $serviceRequest->admin_notes }}
                        </div>
                    @else
                        <p class="text-muted mb-0">No notes added yet.</p>
                    @endif

                    <hr>

                    <form method="POST" action="{{ route('admin.service-requests.add-notes', $serviceRequest) }}">
                        @csrf
                        <div class="form-group">
                            <label for="admin_notes">Add or Update Notes</label>
                            <textarea name="admin_notes"
                                      id="admin_notes"
                                      class="form-control @error('admin_notes') is-invalid @enderror"
                                      rows="4"
                                      placeholder="Add internal notes about this service request...">{{ $serviceRequest->admin_notes }}</textarea>
                            @error('admin_notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Save Notes
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            {{-- Status Management --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-tasks"></i> Status Management</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">
                        <strong>Current Status:</strong><br>
                        @switch($serviceRequest->status)
                            @case('pending')
                                <span class="badge bg-warning text-dark" style="font-size: 14px; padding: 8px 12px;">Pending</span>
                                @break
                            @case('approved')
                                <span class="badge bg-success" style="font-size: 14px; padding: 8px 12px;">Approved</span>
                                @break
                            @case('rejected')
                                <span class="badge bg-danger" style="font-size: 14px; padding: 8px 12px;">Rejected</span>
                                @break
                        @endswitch
                    </p>

                    <form method="POST" action="{{ route('admin.service-requests.update-status', $serviceRequest) }}" id="statusForm">
                        @csrf
                        <div class="form-group">
                            <label for="status">Change Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" disabled>-- Select Status --</option>
                                <option value="pending" {{ $serviceRequest->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $serviceRequest->status === 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $serviceRequest->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-check"></i> Update Status
                        </button>
                    </form>
                </div>
            </div>

            {{-- Request Metadata --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Request Information</h5>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                        <strong>Request ID</strong>
                        <p class="text-muted mb-0">#{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <div style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                        <strong>Submitted Date</strong>
                        <p class="text-muted mb-0">{{ $serviceRequest->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>

                    <div style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid #eee;">
                        <strong>Last Updated</strong>
                        <p class="text-muted mb-0">{{ $serviceRequest->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>

                    <div>
                        <strong>Customer Email</strong>
                        <p class="text-muted mb-0">
                            <a href="mailto:{{ $serviceRequest->email }}">{{ $serviceRequest->email }}</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-bolt"></i> Quick Actions</h5>
                </div>
                <div class="card-body">
                    <a href="mailto:{{ $serviceRequest->email }}?subject=Re:%20Your%20Service%20Request%20%23{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}"
                       class="btn btn-success btn-block mb-2">
                        <i class="fas fa-envelope"></i> Reply via Email
                    </a>
                    <a href="tel:{{ $serviceRequest->phone }}"
                       class="btn btn-info btn-block mb-2">
                        <i class="fas fa-phone"></i> Call Customer
                    </a>
                    <form method="POST"
                          action="{{ route('admin.service-requests.destroy', $serviceRequest) }}"
                          onsubmit="return confirm('Are you sure? This cannot be undone.');"
                          style="display: inline-block; width: 100%;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i> Delete Request
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 8px;
    }

    .card-header {
        border-radius: 8px 8px 0 0;
        font-weight: 600;
    }

    .badge {
        font-size: 11px;
        padding: 5px 8px;
        font-weight: 600;
    }

    .form-control {
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .btn {
        border-radius: 4px;
        font-weight: 600;
    }
</style>
@endsection
