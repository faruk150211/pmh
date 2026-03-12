@extends('backend.layouts.master')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3" style="color: #2c3e50; font-weight: 600;">Services Management</h1>
        </div>
        <div class="col-sm-6 text-end">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary" style="border-radius: 6px; padding: 10px 25px; font-weight: 600;">
                <i class="fas fa-plus"></i> Add New Service
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none; margin-bottom: 20px;">
            <strong>✓ Success!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none; margin-bottom: 20px;">
            <strong>⚠ Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Responsive Data Table -->
    <div class="card" style="border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover mb-0" style="white-space: nowrap;">
                <thead style="background-color: #f8f9fa; border-bottom: 2px solid #e9ecef;">
                    <tr>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600; color: #555;">ID</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600;">Title (English)</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600;">Title (Bengali)</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600;">Slug (EN)</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600;">Banner</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600;">Created</th>
                        <th style="padding: 15px 20px; color: #2c3e50; font-weight: 600; text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($services->count() > 0)
                        @foreach($services as $service)
                            <tr style="border-bottom: 1px solid #e9ecef; transition: background-color 0.2s ease;">
                                <td style="padding: 15px 20px; color: #555;">
                                    <span class="badge bg-light text-dark" style="font-size: 0.85rem;">{{ $service->id }}</span>
                                </td>
                                <td style="padding: 15px 20px; color: #555;">
                                    <strong>{{ \Illuminate\Support\Str::limit($service->title_en, 30) }}</strong>
                                </td>
                                <td style="padding: 15px 20px; color: #666;">
                                    {{ $service->title_bn ? \Illuminate\Support\Str::limit($service->title_bn, 30) : '—' }}
                                </td>
                                <td style="padding: 15px 20px; color: #666;">
                                    <code style="background-color: #f5f5f5; padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">
                                        {{ $service->slug_en ?? '—' }}
                                    </code>
                                </td>
                                <td style="padding: 15px 20px;">
                                    @if($service->banner)
                                        <div class="d-inline-block">
                                            <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->title_en }}"
                                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px; cursor: pointer; transition: transform 0.2s;"
                                                 onmouseover="this.style.transform='scale(1.1)'"
                                                 onmouseout="this.style.transform='scale(1)'"
                                                 data-bs-toggle="modal" data-bs-target="#imageModal{{ $service->id }}">
                                        </div>
                                        <!-- Image Modal -->
                                        <div class="modal fade" id="imageModal{{ $service->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">{{ $service->title_en }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('storage/' . $service->banner) }}" alt="{{ $service->title_en }}" style="max-width: 100%; border-radius: 8px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span style="color: #999; font-size: 0.85rem;">No image</span>
                                    @endif
                                </td>
                                <td style="padding: 15px 20px; color: #666; font-size: 0.9rem;">
                                    {{ $service->created_at->format('M d, Y') }}
                                </td>
                                <td style="padding: 15px 20px; text-align: center;">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                           class="btn btn-sm btn-info" style="border-radius: 4px 0 0 4px; padding: 6px 10px;" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.services.destroy', $service->id) }}"
                                              style="display: inline;"
                                              onsubmit="return confirm('Are you sure you want to delete this service?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 0 4px 4px 0; padding: 6px 10px;" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" style="padding: 40px 20px; text-align: center; color: #999;">
                                <i class="fas fa-inbox" style="font-size: 2.5rem; margin-bottom: 10px;"></i>
                                <p style="margin: 10px 0 0 0; font-size: 1.1rem;">No services found. <a href="{{ route('admin.services.create') }}" style="color: #3498db;">Create one now!</a></p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($services->hasPages())
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination" style="gap: 5px;">
                    {{-- Previous Page Link --}}
                    @if ($services->onFirstPage())
                        <li class="page-item disabled"><span class="page-link" style="border-radius: 6px;">← Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $services->previousPageUrl() }}" style="border-radius: 6px;">← Previous</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                        @if ($page == $services->currentPage())
                            <li class="page-item active"><span class="page-link" style="border-radius: 6px; background-color: #3498db; border-color: #3498db;">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}" style="border-radius: 6px;">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($services->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $services->nextPageUrl() }}" style="border-radius: 6px;">Next →</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link" style="border-radius: 6px;">Next →</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>

<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa !important;
    }

    .badge {
        padding: 4px 8px;
    }

    .btn-group .btn {
        padding: 6px 12px;
        font-size: 0.85rem;
    }

    .btn-info {
        background-color: #17a2b8 !important;
        border-color: #17a2b8 !important;
        color: white;
    }

    .btn-info:hover {
        background-color: #138496 !important;
        border-color: #117a8b !important;
    }

    .btn-danger {
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333 !important;
        border-color: #bd2130 !important;
    }

    .btn-primary {
        background-color: #3498db !important;
        border-color: #3498db !important;
    }

    .btn-primary:hover {
        background-color: #2980b9 !important;
        border-color: #2980b9 !important;
    }

    .pagination .page-link {
        color: #3498db;
        border-color: #dee2e6;
        transition: all 0.2s;
    }

    .pagination .page-link:hover {
        background-color: #f8f9fa;
        border-color: #3498db;
    }

    .pagination .page-item.active .page-link:hover {
        background-color: #3498db;
        border-color: #3498db;
    }

    @media (max-width: 768px) {
        .table {
            font-size: 0.85rem;
        }

        .table-responsive {
            -webkit-overflow-scrolling: touch;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .btn-group .btn {
            border-radius: 4px !important;
        }

        th, td {
            padding: 10px 10px !important;
        }

        h1.h3 {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 480px) {
        .table {
            font-size: 0.75rem;
        }

        th, td {
            padding: 8px 5px !important;
        }

        .card {
            border-radius: 8px !important;
        }
    }
</style>

@endsection
