@extends('backend.layouts.master')

@section('title', 'View Setting - Admin Panel')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">
                <i class="fas fa-eye"></i> View Setting
            </h1>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label text-muted">Setting Key</label>
                        <code class="d-block p-2 bg-light rounded">{{ $setting->key }}</code>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Value</label>
                        <div class="bg-light p-3 rounded" style="min-height: 100px; word-wrap: break-word;">
                            @if ($setting->type === 'textarea')
                                {!! nl2br(e($setting->value)) !!}
                            @elseif ($setting->type === 'boolean')
                                <span class="badge {{ $setting->value ? 'badge-success' : 'badge-danger' }}">
                                    {{ $setting->value ? 'Yes' : 'No' }}
                                </span>
                            @else
                                {{ $setting->value }}
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Category</label>
                                <p class="text-capitalize">{{ str_replace('_', ' ', $setting->category) }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label text-muted">Type</label>
                                <p><span class="badge badge-info">{{ ucfirst($setting->type) }}</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Description</label>
                        <p>{{ $setting->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-muted">Last Updated</label>
                        <p>{{ $setting->updated_at->format('M d, Y H:i A') }}</p>
                    </div>

                    <div class="form-group mt-4">
                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
