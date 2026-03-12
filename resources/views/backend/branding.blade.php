@extends('backend.layouts.master')

@section('title', 'Branding Manager - Admin Panel')

@section('content')
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1><i class="fas fa-palette"></i> Branding Settings</h1>
            <p class="text-muted">Manage your website logo, favicon, and visual branding</p>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Settings
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

    <div class="row">
        <!-- Logo Settings -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-image"></i> Website Logo</h5>
                </div>
                <div class="card-body">
                    @php
                        $logo = setting('logo_url', '/frontend/assets/img/logo.webp');
                    @endphp

                    <div class="text-center mb-4" style="min-height: 150px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 4px;">
                        @if($logo)
                            <img src="{{ asset($logo) }}" alt="{{ setting('site_logo_alt_text', 'Logo') }}" style="max-height: 120px; max-width: 100%;">
                        @else
                            <p class="text-muted">No logo configured</p>
                        @endif
                    </div>

                    <form action="{{ route('admin.settings.update', 'logo_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Current Logo URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $logo }}" readonly>
                                <div class="input-group-append">
                                    <a href="{{ route('admin.settings.edit', 'logo_url_id') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-edit"></i> Edit URL
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alt Text</label>
                            <input type="text" class="form-control" value="{{ setting('site_logo_alt_text', 'Logo') }}" readonly>
                            <small class="form-text text-muted">Used for accessibility and when image fails to load</small>
                        </div>

                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle"></i>
                            <strong>Logo Location:</strong><br>
                            File path: <code>public{{ $logo }}</code>
                        </div>

                        <p class="text-muted small">
                            <i class="fas fa-lightbulb"></i>
                            To change the logo, go to <strong>Settings</strong> and search for <strong>logo_url</strong>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Favicon Settings -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-bookmark"></i> Favicon</h5>
                </div>
                <div class="card-body">
                    @php
                        $favicon = setting('favicon_url', '/favicon.ico');
                    @endphp

                    <div class="text-center mb-4" style="min-height: 150px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 4px;">
                        <div>
                            <img src="{{ asset($favicon) }}?t={{ time() }}" alt="Favicon" style="width: 64px; height: 64px; border: 2px solid #ddd; border-radius: 4px;">
                            <p class="text-muted text-center mt-2 small">Preview (64x64)</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.settings.update', 'favicon_update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Current Favicon URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $favicon }}" readonly>
                                <div class="input-group-append">
                                    <a href="{{ route('admin.settings.edit', 'favicon_url_id') }}" class="btn btn-outline-success">
                                        <i class="fas fa-edit"></i> Edit URL
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-warning" role="alert">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Cache Notice:</strong><br>
                            Faviconchanges may take time to appear. Do a hard refresh (<strong>Ctrl+F5</strong> or <strong>Cmd+Shift+R</strong>) to see the change.
                        </div>

                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle"></i>
                            <strong>Favicon Location:</strong><br>
                            File path: <code>public{{ $favicon }}</code><br>
                            Recommended sizes: 16x16, 32x32, or 64x64 px
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Name & Tagline -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-heading"></i> Site Identity Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Site Name</strong></label>
                                <p class="form-control-plaintext">{{ setting('site_name', 'Not set') }}</p>
                                <small class="form-text text-muted">Displayed in browser tabs, search results, and next to logo</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Site Tagline</strong></label>
                                <p class="form-control-plaintext">{{ setting('site_tagline', 'Not set') }}</p>
                                <small class="form-text text-muted">Short motto or description</small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><strong>Theme Color</strong></label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div style="width: 50px; height: 50px; background: {{ setting('theme_color', '#007bff') }}; border: 2px solid #ddd; border-radius: 4px;"></div>
                            <code>{{ setting('theme_color', '#007bff') }}</code>
                        </div>
                        <small class="form-text text-muted">Primary brand color used throughout the site</small>
                    </div>

                    <hr>

                    <p class="text-center">
                        <a href="{{ route('admin.settings.index') }}" class="btn btn-primary">
                            <i class="fas fa-cog"></i> Manage All Settings
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: box-shadow 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .card-header {
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }
</style>
@endsection
