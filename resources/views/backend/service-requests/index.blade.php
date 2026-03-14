@extends('backend.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="mb-0">
                <i class="fas fa-calendar-check"></i> Service Requests
            </h2>
        </div>
        <div class="col-md-4 text-right">
            @if($totalPending > 0)
                <span class="badge bg-danger" style="font-size: 16px; padding: 8px 12px;">
                    {{ $totalPending }} Pending
                </span>
            @endif
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

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">All Service Requests</h5>
        </div>
        <div class="card-body p-0">
            @if($serviceRequests->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light text-dark">
                            <tr>
                                <th style="width: 80px;">ID</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Submitted</th>
                                <th style="width: 100px; text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($serviceRequests as $request)
                                <tr>
                                    <td>
                                        <strong>#{{ str_pad($request->id, 6, '0', STR_PAD_LEFT) }}</strong>
                                    </td>
                                    <td>
                                        <strong>{{ $request->name }}</strong>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $request->email }}">{{ $request->email }}</a>
                                    </td>
                                    <td>
                                        <span>
                                            {{ ucfirst(str_replace('_', ' ', $request->service)) }}
                                        </span>
                                    </td>
                                    <td>
                                        @switch($request->status)
                                            @case('pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                                @break
                                            @case('approved')
                                                <span class="badge bg-success">Approved</span>
                                                @break
                                            @case('rejected')
                                                <span class="badge bg-danger">Rejected</span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">{{ $request->status }}</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $request->created_at->format('M d, Y H:i') }}
                                        </small>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.service-requests.show', $request) }}"
                                               class="btn btn-sm btn-info"
                                               title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form method="POST"
                                                  action="{{ route('admin.service-requests.destroy', $request) }}"
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Are you sure? This cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="card-footer bg-light">
                    {{ $serviceRequests->links() }}
                </div>
            @else
                <div class="alert alert-info p-4 mb-0">
                    <i class="fas fa-info-circle"></i> No service requests found.
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .btn-group {
        display: flex;
        gap: 5px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .badge {
        font-size: 11px;
        padding: 5px 8px;
        font-weight: 600;
    }

    .table td {
        vertical-align: middle;
    }
</style>
@endsection
