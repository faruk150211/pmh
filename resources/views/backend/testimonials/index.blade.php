@extends('backend.layouts.master')

@section('title', 'Manage Testimonials')

@section('content')
<div class="container-custom">
    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            margin: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }

        .table-container {
            background: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .testimonials-table {
            width: 100%;
            border-collapse: collapse;
        }

        .testimonials-table thead {
            background: #f8f9fa;
        }

        .testimonials-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e9ecef;
        }

        .testimonials-table td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .testimonials-table tbody tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-badge.active {
            background: #d4edda;
            color: #155724;
        }

        .status-badge.inactive {
            background: #e9ecef;
            color: #666;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-edit {
            background: #0084d6;
            color: white;
        }

        .btn-edit:hover {
            background: #0067a6;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            border: 1px solid #e9ecef;
            border-radius: 4px;
            text-decoration: none;
            color: #667eea;
        }

        .pagination .active span {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 20px;
        }

        .picture-thumbnail {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .picture-cell {
            text-align: center;
        }
    </style>

    <div class="page-header">
        <div>
            <h1 style="color: #333; font-size: 28px; margin-bottom: 10px;">Manage Testimonials</h1>
            <p style="color: #666; margin: 0;">Create, edit, and manage customer testimonials</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">+ Add New Testimonial</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        @if($testimonials->count() > 0)
            <table class="testimonials-table">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 8%;">Picture</th>
                        <th style="width: 22%;">Title (EN)</th>
                        <th style="width: 22%;">Author</th>
                        <th style="width: 18%;">Status</th>
                        <th style="width: 25%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr>
                            <td>#{{ $testimonial->id }}</td>
                            <td class="picture-cell">
                                @if($testimonial->picture)
                                    <img src="{{ asset($testimonial->picture) }}" alt="Picture" class="picture-thumbnail" title="Picture available" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                                    <span style="color: #999; font-size: 12px; display: none;">No image</span>
                                @else
                                    <span style="color: #999; font-size: 12px;">N/A</span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <strong>EN:</strong> {{ Str::limit($testimonial->title_en ?? 'N/A', 30) }}<br>
                                    <strong>BN:</strong> {{ Str::limit($testimonial->title_bn ?? 'N/A', 30) }}
                                </div>
                            </td>
                            <td>
                                <div>
                                    <strong>EN:</strong> {{ $testimonial->author_en }}<br>
                                    <strong>BN:</strong> {{ $testimonial->author_bn }}
                                </div>
                            </td>
                            <td>
                                <span class="status-badge {{ $testimonial->show_on_home ? 'active' : 'inactive' }}">
                                    {{ $testimonial->show_on_home ? 'Show on Home' : 'Hidden' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $testimonials->links() }}
            </div>
        @else
            <div class="empty-state">
                <p>No testimonials found</p>
                <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">Create Your First Testimonial</a>
            </div>
        @endif
    </div>
</div>
@endsection
