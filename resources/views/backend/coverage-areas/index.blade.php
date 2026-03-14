@extends('backend.layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Coverage Areas</h2>
    <a href="{{ route('admin.coverage-areas.create') }}" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Coverage Area
    </a>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>✓ Success!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead style="background-color: #f8f9fa;">
                <tr>
                    <th style="color: #2c3e50; font-weight: 600;">Order</th>
                    <th style="color: #2c3e50; font-weight: 600;">Title (EN)</th>
                    <th style="color: #2c3e50; font-weight: 600;">Title (BN)</th>
                    <th style="color: #2c3e50; font-weight: 600;">Show on Home</th>
                    <th style="color: #2c3e50; font-weight: 600;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coverageAreas as $area)
                    <tr>
                        <td>
                            <span class="badge bg-info">{{ $area->order }}</span>
                        </td>
                        <td>{{ $area->title_en }}</td>
                        <td>{{ $area->title_bn }}</td>
                        <td>
                            @if($area->show_on_home)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.coverage-areas.edit', $area->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.coverage-areas.destroy', $area->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this coverage area?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <p style="color: #999;">No coverage areas found. <a href="{{ route('admin.coverage-areas.create') }}">Create one</a></p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $coverageAreas->links() }}
</div>
@endsection
