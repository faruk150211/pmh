@extends('backend.layouts.master')

@section('title', 'Website Settings - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1><i class="fas fa-sliders-h"></i> Website Settings</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Setting
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please fix the following errors:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @forelse($settings as $category => $categorySettings)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-capitalize">
                <i class="fas fa-folder"></i> {{ ucfirst(str_replace('_', ' ', $category)) }}
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Setting Key</th>
                            <th>Value</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorySettings as $setting)
                        <tr>
                            <td>
                                <code>{{ $setting->key }}</code>
                            </td>
                            <td>
                                @if ($setting->type === 'textarea')
                                    <small>{{ Str::limit($setting->value, 50) }}</small>
                                @elseif ($setting->type === 'boolean')
                                    <span class="badge {{ $setting->value ? 'badge-success' : 'badge-danger' }}">
                                        {{ $setting->value ? 'Yes' : 'No' }}
                                    </span>
                                @else
                                    {{ $setting->value }}
                                @endif
                            </td>
                            <td>{{ $setting->description }}</td>
                            <td>
                                <span>{{ ucfirst($setting->type) }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                No settings found in this category
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-info" role="alert">
        <i class="fas fa-info-circle"></i> No settings found. <a href="{{ route('admin.settings.create') }}">Create one now</a>
    </div>
    @endforelse
</div>
@endsection
