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
            <i class="fas fa-check-circle"></i> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validation Error!</strong>
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
        <!-- Logo Upload -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-image"></i> Website Logo</h5>
                </div>
                <div class="card-body">
                    <div id="logoPreviewContainer" class="text-center mb-4" style="min-height: 150px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 4px;">
                        @if($logo && $logo !== '/frontend/assets/img/logo.webp')
                            <img src="{{ asset($logo) }}?t={{ time() }}" alt="Logo" style="max-height: 120px; max-width: 100%;">
                        @else
                            <img src="{{ asset('/frontend/assets/img/logo.webp') }}" alt="Default Logo" style="max-height: 120px; max-width: 100%;">
                        @endif
                    </div>

                    <form action="{{ route('admin.branding.upload-logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="logo" class="form-label"><strong>Upload Logo</strong></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" onchange="previewLogo(this)">
                                <label class="custom-file-label" for="logo">Choose file...</label>
                            </div>
                            @error('logo')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted d-block mt-2">
                                <i class="fas fa-info-circle"></i>
                                Supported: JPG, PNG, WebP, GIF, SVG (Max: 2MB)
                            </small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-upload"></i> Upload Logo
                            </button>
                        </div>
                    </form>

                    <form action="{{ route('admin.branding.delete-logo') }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-block" onclick="return confirm('Reset logo to default?')">
                            <i class="fas fa-redo"></i> Reset to Default
                        </button>
                    </form>

                    <hr>
                    <p class="text-muted small text-center">
                        <strong>Current Path:</strong><br>
                        <code>{{ $logo }}</code>
                    </p>
                </div>
            </div>
        </div>

        <!-- Favicon Upload -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-bookmark"></i> Favicon</h5>
                </div>
                <div class="card-body">
                    <div id="faviconPreviewContainer" class="text-center mb-4" style="min-height: 150px; display: flex; align-items: center; justify-content: center; background: #f8f9fa; border-radius: 4px;">
                        <div>
                            <img src="{{ asset($favicon) }}?t={{ time() }}" alt="Favicon" style="width: 64px; height: 64px; border: 2px solid #ddd; border-radius: 4px;">
                            <p class="text-muted text-center mt-2 small">Preview (64x64)</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.branding.upload-favicon') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="favicon" class="form-label"><strong>Upload Favicon</strong></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('favicon') is-invalid @enderror" id="favicon" name="favicon" accept="image/*" onchange="previewFavicon(this)">
                                <label class="custom-file-label" for="favicon">Choose file...</label>
                            </div>
                            @error('favicon')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted d-block mt-2">
                                <i class="fas fa-info-circle"></i>
                                Supported: ICO, PNG, JPG, GIF, WebP (Max: 512KB)
                            </small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-upload"></i> Upload Favicon
                            </button>
                        </div>
                    </form>

                    <form action="{{ route('admin.branding.delete-favicon') }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-block" onclick="return confirm('Reset favicon to default?')">
                            <i class="fas fa-redo"></i> Reset to Default
                        </button>
                    </form>

                    <div class="alert alert-info mt-3 small" role="alert">
                        <i class="fas fa-lightbulb"></i>
                        <strong>Tip:</strong> Hard refresh your browser (Ctrl+F5) to see favicon changes immediately.
                    </div>

                    <hr>
                    <p class="text-muted small text-center">
                        <strong>Current Path:</strong><br>
                        <code>{{ $favicon }}</code>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Site Identity -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-heading"></i> Site Identity</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.branding.update-identity') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="site_name"><strong>Site Name</strong></label>
                                <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name"
                                    value="{{ old('site_name', $siteName) }}" required>
                                @error('site_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small class="form-text text-muted">Displayed in browser tabs, search results, and header</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="site_tagline"><strong>Site Tagline</strong></label>
                                <input type="text" class="form-control @error('site_tagline') is-invalid @enderror" id="site_tagline" name="site_tagline"
                                    value="{{ old('site_tagline', $siteTagline) }}" required>
                                @error('site_tagline')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                                <small class="form-text text-muted">Short motto or slogan</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="site_description"><strong>Site Description</strong></label>
                            <textarea class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" rows="3" required>{{ old('site_description', $siteDescription) }}</textarea>
                            @error('site_description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text text-muted">Used for SEO meta description</small>
                        </div>

                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save"></i> Save Site Identity
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: box-shadow 0.3s ease;
        margin-bottom: 2rem;
    }
    .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .card-header {
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        padding: 1rem 1.25rem;
    }
    .custom-file-label::after {
        content: "Browse";
    }
</style>

<script>
function previewLogo(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('logoPreviewContainer');
            preview.innerHTML = `<img src="${e.target.result}" style="max-height: 120px; max-width: 100%;">`;
        };
        reader.readAsDataURL(input.files[0]);
    }

    const label = input.nextElementSibling;
    label.textContent = input.files[0].name;
}

function previewFavicon(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('faviconPreviewContainer');
            preview.innerHTML = `<div><img src="${e.target.result}" style="width: 64px; height: 64px; border: 2px solid #ddd; border-radius: 4px;"><p class="text-muted text-center mt-2 small">Preview (64x64)</p></div>`;
        };
        reader.readAsDataURL(input.files[0]);
    }

    const label = input.nextElementSibling;
    label.textContent = input.files[0].name;
}
</script>
@endsection
